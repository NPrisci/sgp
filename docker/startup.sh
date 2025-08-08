#!/bin/bash
set -e

echo "✅ Installation des dépendances Laravel"
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "✅ Nettoyage et mise en cache de la configuration"
php artisan config:clear
php artisan config:cache



echo "✅ Lancement des migrations (fresh + seed)"
php artisan migrate:fresh --seed --force

echo "✅ Lancement du serveur nginx/php-fpm"
/start.sh
