#!/bin/bash
set -e

echo "✅ Installation des dépendances Laravel"
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "✅ Copie du fichier .env s'il existe"
if [ -f .env.example ]; then
    cp .env.example .env
fi

echo "✅ Génération de la clé Laravel"
php artisan key:generate

echo "✅ Lancement des migrations"
php artisan migrate --force

echo "✅ Lien du stockage public"
php artisan storage:link || true

echo "✅ Lancement du serveur nginx/php-fpm"
/start.sh
