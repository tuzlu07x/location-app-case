# Base image for composer and dependencies installation
FROM composer:lts as deps

WORKDIR /app

# Install dependencies using Composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction

# Base image for running the application with Apache
FROM php:8.3-apache as final

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    default-mysql-client \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get install -y libssl-dev \
    && docker-php-ext-install sockets \ 
    && docker-php-ext-install pdo pdo_mysql
        
# Enable Apache modules
RUN a2enmod rewrite

# Configure PHP (use production settings)
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Copy all application files to the container
COPY . /var/www/html

# Ensure the permissions are set correctly for Apache to run
RUN chown -R www-data:www-data /var/www/html

# Configure Apache to use the public directory as the DocumentRoot
RUN echo "DocumentRoot /var/www/html/public" > /etc/apache2/sites-available/000-default.conf

# Expose the necessary port
EXPOSE 80

# Set the default user for the container to run as the non-privileged www-data user
USER www-data

# Command to run the application (Apache)
CMD ["apache2-foreground"]
