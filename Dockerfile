# ------------------------------------------------------------
# Etapa 1 — PHP-FPM seguro + extensões
# ------------------------------------------------------------
FROM php:8.2-fpm-alpine AS base

# Instala dependências do sistema
RUN apk update && apk add --no-cache \
    libpq \
    libpng-dev \
    libjpeg-turbo-dev \
    oniguruma-dev \
    libxml2-dev \
    freetype-dev \
    icu-dev \
    zip \
    unzip \
    git \
    curl \
    bash

# Extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_pgsql mbstring tokenizer xml gd intl

# Composer seguro
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Instala dependências PHP
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copia código do Laravel
COPY . .

# Permissões seguras
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod -R 770 storage bootstrap/cache

# ------------------------------------------------------------
# Etapa 2 — Build do front-end com Vite
# ------------------------------------------------------------
FROM node:18-alpine AS frontend

WORKDIR /app
COPY package.json package-lock.json vite.config.js ./
RUN npm ci

COPY resources resources
RUN npm run build

# ------------------------------------------------------------
# Etapa 3 — Servidor Caddy + PHP-FPM
# ------------------------------------------------------------
FROM caddy:2.7-alpine

# Copia app Laravel
COPY --from=base /var/www/html /var/www/html

# Copia build front-end
COPY --from=frontend /app/public/build /var/www/html/public/build

# Caddy config
COPY Caddyfile /etc/caddy/Caddyfile

# Copia PHP-FPM binário
COPY --from=php:8.2-fpm-alpine /usr/local/sbin/php-fpm /usr/local/sbin/php-fpm

# Executa com usuário não-root
USER 1000

EXPOSE 8080

CMD ["caddy", "run", "--config", "/etc/caddy/Caddyfile"]
