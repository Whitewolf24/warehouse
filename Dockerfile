# Use an official PHP base image with FPM (FastCGI Process Manager) for better performance
FROM php:8.1-fpm

# Install necessary system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql gd

# Install Composer globally (for managing Laravel dependencies)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www
WORKDIR /var/www

# Copy your application files into the container
COPY . .

# Set file permissions for Laravel (storage and bootstrap/cache must be writable)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Install Laravel dependencies via Composer
RUN composer install --no-dev --optimize-autoloader

# Expose port 9000 for PHP-FPM to listen on
EXPOSE 9000

# Start PHP-FPM server to serve the application
CMD ["php-fpm"]

