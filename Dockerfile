# ------------------------------------------------------------
# ETAPA 1 — PHP-FPM + extensões + Composer
# ------------------------------------------------------------
FROM php:8.2-fpm-alpine AS php

RUN apk update && apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    oniguruma-dev \
    libxml2-dev \
    freetype-dev \
    icu-dev \
    zip unzip git curl bash

RUN docker-php-ext-install mbstring xml gd intl pdo pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN chmod -R 755 /var/www/html && \
    chmod -R 770 storage bootstrap/cache


# ------------------------------------------------------------
# ETAPA 2 — Build do Vite (Node 22)
# ------------------------------------------------------------
FROM node:22-alpine AS frontend

WORKDIR /app
COPY package.json package-lock.json vite.config.js ./
RUN npm ci

COPY resources resources
RUN npm run build


# ------------------------------------------------------------
# ETAPA 3 — Contêiner final (PHP 8.2 + Apache)
# ------------------------------------------------------------
FROM webdevops/php-apache:8.2

WORKDIR /var/www/html

# Copia código Laravel
COPY . .

# Copia o build do Vite
COPY --from=frontend /app/public/build /var/www/html/public/build

# Instala dependências e ativa módulos
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN a2enmod rewrite headers

# Permissões
RUN chown -R application:application /var/www/html \
    && chmod -R 775 storage bootstrap/cache
