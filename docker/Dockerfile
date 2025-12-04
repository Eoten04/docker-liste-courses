FROM php:8.2-fpm-alpine

LABEL maintainer="Eoten FRERE <eotenfrere@gmail.com>"

RUN apk add --no-cache \
    bash \
    git \
    unzip \
    sqlite-dev \
    icu-dev \
    oniguruma-dev

RUN docker-php-ext-install pdo pdo_sqlite intl mbstring

RUN curl -sS https://getcomposer.org/installer | php \
    -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app/listecourses_Eoten_Romain

COPY ./app/listecourses_Eoten_Romain /app/listecourses_Eoten_Romain

RUN composer install --no-interaction 

EXPOSE 8765

CMD ["php", "-S", "0.0.0.0:8765", "-t", "webroot"]

