#!/bin/bash
set -e

# Ensure storage directory permissions
chown -R www-data:www-data /var/www/storage
chmod -R 755 /var/www/storage

# Clear cache and optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Octane with proper host and port
exec php artisan octane:start --host=0.0.0.0 --port=${PORT:-8080} --workers=1 --task-workers=1
