FROM php:7.4-fpm

RUN apt update && apt install -y wget git unzip libxml2-dev
RUN pecl install xdebug
RUN docker-php-ext-install pdo pdo_mysql soap
RUN docker-php-ext-enable xdebug

ADD ./php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www


USER 1000:1000