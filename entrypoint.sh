#!/bin/sh
set -e

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
until mariadb -h"${DB_HOST:-mysql}" -u"${DB_USERNAME:-zest_user}" -p"${DB_PASSWORD:-Abc@1234}" --skip-ssl -e "SELECT 1" > /dev/null 2>&1; do
    echo "MySQL is unavailable - sleeping"
    sleep 2
done

echo "MySQL is up - continuing..."

# Install composer dependencies if needed
if [ ! -d /var/www/vendor ]; then
    echo "Installing composer dependencies..."
    composer install --no-interaction --prefer-dist
fi

# Run migrations
echo "Running migrations..."
php /var/www/artisan migrate --force || echo "Migration failed (already migrated)"

# Run seeders
echo "Running seeders..."
php /var/www/artisan db:seed --class=DevSeeder --force || echo "Seeding failed (already seeded)"

# Clear caches and create storage link
php /var/www/artisan storage:link || true
php /var/www/artisan config:clear || true
php /var/www/artisan cache:clear || true
php /var/www/artisan route:clear || true

echo "Starting PHP-FPM..."
exec php-fpm
