# ------------------------------------------------------------
# ETAPA 1 — PHP-FPM leve + extensões essenciais (SEM PDO DB)
# ------------------------------------------------------------
FROM php:8.2-fpm-alpine AS base

RUN apk update && apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    oniguruma-dev \
    libxml2-dev \
    freetype-dev \
    icu-dev \
    zip unzip git curl bash

# Extensões PHP necessárias (SEM tokenizer)
RUN docker-php-ext-install mbstring xml gd intl

# Composer seguro
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia TUDO primeiro (muito importante!)
COPY . .

# Instala dependências PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissões seguras
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod -R 770 storage bootstrap/cache


# ------------------------------------------------------------
# ETAPA 2 — Build Vite
# ------------------------------------------------------------
FROM node:18-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json vite.config.js ./
RUN npm ci

COPY resources resources
RUN npm run build


# ------------------------------------------------------------
# ETAPA 3 — Caddy + PHP-FPM ultra leve e seguro
# ------------------------------------------------------------
FROM caddy:2.7-alpine

# 1. Correção do Caddy (Já aplicada)
RUN setcap -r /usr/bin/caddy

COPY --from=base /var/www/html /var/www/html
COPY --from=frontend /app/public/build /var/www/html/public/build

COPY Caddyfile /etc/caddy/Caddyfile

# Copia PHP-FPM binário
COPY --from=php:8.2-fpm-alpine /usr/local/sbin/php-fpm /usr/local/sbin/php-fpm

# NOVO: Copia o script de inicialização e o torna executável
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 8080

# NOVO: Altera o CMD para executar o script que inicia os dois serviços
CMD ["/usr/local/bin/start.sh"]