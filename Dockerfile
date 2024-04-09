FROM php:8.2-fpm

ARG USER_NAME=phpuser
ARG USER_ID=1000
ARG GROUP_ID=1000

RUN groupadd -g ${GROUP_ID} ${USER_NAME} && useradd -u ${USER_ID} -g ${USER_NAME} -m ${USER_NAME}

RUN apt-get update
RUN apt-get -y install git libzip-dev
RUN docker-php-ext-install pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer


WORKDIR "/applications"

EXPOSE 8001

USER ${USER_NAME}
