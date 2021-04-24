FROM php:7.3-fpm

USER root

# Set working directory
WORKDIR /var/www

RUN apt-get update && \
    apt-get install libzip-dev -y && \
    docker-php-ext-install zip && \
    docker-php-ext-install pdo pdo_mysql bcmath

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN getent group www || groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www || true

# Change current user to www
USER www
# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www


# Expose port 9000 and start php-fpm server
EXPOSE 9000
ENTRYPOINT ["php-fpm"]
