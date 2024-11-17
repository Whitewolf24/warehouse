# Use an official PHP base image with FPM
FROM php:8.1-fpm

# Install necessary system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    curl

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www

# Copy your application files into the container
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 9000 for the app
EXPOSE 9000

# Run PHP-FPM server
CMD ["php-fpm"]