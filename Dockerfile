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
# ETAPA 2 — Build do Vite
# ------------------------------------------------------------
FROM node:18-alpine AS frontend

WORKDIR /app
COPY package.json package-lock.json vite.config.js ./
RUN npm ci

COPY resources resources
RUN npm run build


# ------------------------------------------------------------
# ETAPA 3 — Caddy + PHP-FPM (Completo e funcionando)
# ------------------------------------------------------------
FROM caddy:2.7-alpine

# Remove capabilities que o Render bloqueia
RUN setcap -r /usr/bin/caddy || true

WORKDIR /var/www/html

# Código do Laravel
COPY --from=php /var/www/html /var/www/html

# Build do Vite
COPY --from=frontend /app/public/build /var/www/html/public/build

# Caddyfile
COPY Caddyfile /etc/caddy/Caddyfile

# 🔥 COPIA COMPLETA DO PHP-FPM
COPY --from=php /usr/local/ /usr/local/

# 🔥 INCLUI php.ini e php-fpm.conf
COPY --from=php /usr/local/etc/ /usr/local/etc/

# Script de inicialização
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 8080

CMD ["/usr/local/bin/start.sh"]
