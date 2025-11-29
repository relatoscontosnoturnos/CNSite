#!/bin/sh

# Inicia o PHP-FPM em background
echo "Iniciando PHP-FPM..."
/usr/local/sbin/php-fpm &

# Inicia o Caddy em foreground (mantendo o container ativo)
echo "Iniciando Caddy..."
exec caddy run --config /etc/caddy/Caddyfile --adapter caddyfile