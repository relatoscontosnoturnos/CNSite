# ------------------------------------------------------------
# STAGE 1 — Vite Build
# ------------------------------------------------------------
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json vite.config.js ./
RUN npm ci

COPY resources ./resources
COPY public ./public
RUN npm run build


# ------------------------------------------------------------
# STAGE 2 — Apache + PHP 8.2
# ------------------------------------------------------------
FROM php:8.2-apache

WORKDIR /var/www/html

# Instala libs necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip unzip git curl

# Extensões
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Ativa rewrite
RUN a2enmod rewrite

# APONTA DocumentRoot para /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's|/var/www/|/var/www/html/public|g' /etc/apache2/apache2.conf

# PERMITIR htaccess
RUN echo "<Directory /var/www/html/public>
    AllowOverride All
</Directory>" >> /etc/apache2/apache2.conf

COPY . .

COPY --from=frontend /app/public/build /var/www/html/public/build

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080
CMD ["apache2-foreground"]
