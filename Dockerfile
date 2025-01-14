# Use an official PHP image with Apache
FROM php:8.2-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set the default document root explicitly
RUN sed -i 's|/var/www/html|/var/www/html|g' /etc/apache2/sites-available/000-default.conf

# Copy application code to the container
COPY app/ /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Set environment variables for the app (optional for debugging)
ENV DB_HOST=db \
    DB_NAME=foodc \
    DB_USER=root \
    DB_PASS=root

# Expose port 80
EXPOSE 80
