# Use official PHP image with Apache
FROM php:8.2-apache

# Copy all files to Apache root
COPY . /var/www/html/

# Enable URL rewriting if needed
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Expose default Apache port (Render uses 10000)
EXPOSE 10000

# Start Apache
CMD ["apache2-foreground"]