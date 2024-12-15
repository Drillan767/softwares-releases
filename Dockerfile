FROM php:8.3-fpm-alpine

ENV PHP_OPCACHE_ENABLE=1

USER root

COPY --chown=www-data:www-data . /var/www/html

USER www-data

RUN composer install --no-interaction --optimize-autoloader --no-dev