FROM php:8.1-apache

RUN apt-get update \
    && apt-get install -y libpq-dev libzip-dev \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable pdo_mysql

WORKDIR /var/www/html