FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    nodejs npm libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Create SSL directory and download certificate
RUN mkdir -p storage/certs && \
    curl -o storage/certs/isrgrootx1.pem https://letsencrypt.org/certs/isrgrootx1.pem

# Copy application files
COPY . .

# Copy .env if doesn't exist
RUN cp .env.example .env || true

# Install dependencies
RUN composer install
RUN npm install

# Build frontend assets
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Generate key
RUN php artisan key:generate --force

# Expose single port for Cloud Run
EXPOSE 8080

# Use nginx configuration
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf

# Start Laravel and nginx
CMD ["sh", "-c", "php artisan serve:dev --host=0.0.0.0 --port=8080"]
