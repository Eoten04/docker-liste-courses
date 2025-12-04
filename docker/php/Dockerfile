FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    zip \
    netcat-openbsd \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    && a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Application Code (Adjusted path for build context)
# If build context is root, this is still app/...
# If build context is docker/php, we need to go up? Docker doesn't allow going up from context.
# So context MUST be root.
COPY app/listecourses_Eoten_Romain /var/www/html

# Copy entrypoint
COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Configure Apache DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/webroot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set entrypoint
ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
