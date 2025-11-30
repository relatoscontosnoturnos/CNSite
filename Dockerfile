# ------------------------------------------------------------
# STAGE 1 — Build do Vite (Node 22)
# ------------------------------------------------------------
FROM node:22-alpine AS frontend

WORKDIR /app

# Copia arquivos base do front
COPY package.json package-lock.json vite.config.js ./

# Instala dependências
RUN npm ci

# Copia as pastas que o Vite usa
COPY resources ./resources
COPY public ./public

# Build final do front (gera public/build)
RUN npm run build


# ------------------------------------------------------------
# STAGE 2 — PHP 8.2 + Apache (imagem estável)
# ------------------------------------------------------------
FROM php:8.2-apache

# Instala libs necessárias para o Laravel funcionar
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip unzip git curl

# Extensões PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Ativa mod_rewrite (OBRIGATÓRIO para Laravel)
RUN a2enmod rewrite

# Altera o DocumentRoot para /var/www/html/public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's|/var/www/|/var/www/html/public|g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Copia código Laravel
COPY . .

# Copia o build do Vite gerado no Stage 1
COPY --from=frontend /app/public/build /var/www/html/public/build

# Instala dependências PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissões Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Render usa a porta 8080 internamente
EXPOSE 8080

# Comando final
CMD ["apache2-foreground"]
