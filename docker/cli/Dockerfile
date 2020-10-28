FROM php:8.0.0RC2-cli

ENV USER_HOME=/srv/php
ENV APP_HOME=${USER_HOME}/app
ENV APP_ENV=${APP_ENV}

ENV DOCKER_UID=1000
ENV DOCKER_GID=1000

RUN groupadd -g ${DOCKER_GID} php &&\
 useradd -d ${USER_HOME} -u ${DOCKER_UID} -g ${DOCKER_GID} php &&\
 mkdir ${USER_HOME} &&\
 chown -R php:php ${USER_HOME}

RUN set -ex &&\
 apt-get update &&\
 apt-get install -y --no-install-recommends wget unzip libzip-dev zlib1g-dev libicu-dev &&\
 docker-php-ext-install -j 8 pdo_mysql zip intl &&\
 wget https://github.com/FriendsOfPHP/pickle/releases/latest/download/pickle.phar -O /usr/bin/pickle &&\
 chmod +x /usr/bin/pickle &&\
 pickle install -n mongodb &&\
 docker-php-ext-enable mongodb &&\
 rm -rf /var/lib/apt/lists/* && rm -rf /tmp/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

USER php
WORKDIR ${APP_HOME}
