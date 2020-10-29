FROM php:8.0.0RC3-fpm

RUN chown -R www-data: /var/www/html

ARG DOCKER_UID=1000
ENV WWW_DATA_UID=${DOCKER_UID}
ENV APP_ENV=${APP_ENV}

RUN set -ex &&\
 apt-get update &&\
 apt-get install -y --no-install-recommends wget unzip libzip-dev libicu-dev &&\
 wget https://github.com/FriendsOfPHP/pickle/releases/latest/download/pickle.phar -O /usr/bin/pickle &&\
 chmod +x /usr/bin/pickle &&\
 docker-php-ext-install -j 8 opcache pdo_mysql intl zip &&\
 pickle install -n redis &&\
 pickle install -n amqp &&\
 pickle install -n mongodb &&\
 pickle install -n xdebug &&\
 docker-php-ext-configure intl &&\
 docker-php-ext-enable mongodb &&\
 rm -rf /var/lib/apt/lists/* && rm -rf /tmp/*

USER www-data
WORKDIR /var/www/html
