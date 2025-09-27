#!/bin/sh
set -e


if [ ! -f /var/www/zest ]; then
    touch /var/www/zest
    chown www-data:www-data /var/www/zest
    echo "SQLite database created: /var/www/zest"
fi

if [ ! -d /var/www/vendor ]; then
    composer install --no-interaction --prefer-dist
fi

php /var/www/artisan migrate --force || echo "Migration failed (already migrated)"
php /var/www/artisan db:seed --class=DevSeeder --force || echo "Seeding failed (already seeded)"
php /var/www/artisan storage:link || true
php /var/www/artisan config:clear || true
php /var/www/artisan cache:clear || true
php /var/www/artisan route:clear || true



exec php-fpm
