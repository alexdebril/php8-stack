FROM php:8.0.0-fpm

RUN chown -R www-data: /var/www/html

ARG DOCKER_UID=1000
ENV WWW_DATA_UID=${DOCKER_UID}
ENV APP_ENV=${APP_ENV}

RUN set -ex &&\
 apt-get update &&\
 apt-get install -y --no-install-recommends unzip libzip-dev libicu-dev &&\
 docker-php-ext-install -j 8 opcache pdo_mysql intl zip &&\
 pecl install -n redis xdebug mongodb &&\
 docker-php-ext-configure intl &&\
 docker-php-ext-enable mongodb &&\
 docker-php-ext-enable xdebug &&\
 rm -rf /var/lib/apt/lists/* && rm -rf /tmp/*

USER www-data
WORKDIR /var/www/html
