FROM php:8.2-apache

ENV DB_DNS = mysql:host=localhost;dbname=ecom;
ENV DB_USER = best
ENV DB_PASS = root
# Install necessary packages
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

RUN a2dismod mpm_event && a2enmod mpm_prefork

# Set up Apache
COPY apache2.conf /etc/apache2/apache2.conf
RUN a2enmod rewrite

# Copy application files
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

# Set entry point
CMD ["apache2-foreground"]
# RUN sudo apt install ph/p8.1


