FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    nodejs npm

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

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

# Expose ports
EXPOSE 8000 8080 5173

# Set environment variables
ENV PORT=8080
ENV VITE_PORT=5173
ENV HOST=0.0.0.0
ENV VITE_DEV_SERVER_URL=http://localhost:5173

# Create a startup script that handles both environments
RUN echo '#!/bin/bash\n\
    if [ "$APP_ENV" = "production" ]; then\n\
    php artisan serve --host=0.0.0.0 --port=8080\n\
    else\n\
    php artisan serve:dev\n\
    fi' > /var/www/start.sh && \
    chmod +x /var/www/start.sh

COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Start servers
CMD ["/usr/local/bin/start.sh"]
