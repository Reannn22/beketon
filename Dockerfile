FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libbrotli-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Swoole
RUN pecl install swoole && docker-php-ext-enable swoole

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy application files
COPY . .

# Copy .env if doesn't exist
RUN cp .env.example .env || true

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Generate key
RUN php artisan key:generate --force

# Set environment
ENV PORT=8080
ENV OCTANE_HTTPS=true

EXPOSE 8080

# Start Octane with shell (PORT from ENV)
CMD ["sh", "-c", "php artisan octane:start --server=swoole --host=0.0.0.0 --port=$PORT"]
