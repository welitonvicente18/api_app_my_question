FROM serversideup/php:8.5-fpm-alpine

USER root

ENV PHP_DISPLAY_ERRORS=1

RUN install-php-extensions xdebug

ARG USER_ID=1000
ARG GROUP_ID=1000

# adiciona user padrão linux 1000:1000 como www-data (padrão nginx/phpfpm)
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID \
  && docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID

USER www-data
