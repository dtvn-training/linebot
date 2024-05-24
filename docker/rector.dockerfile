FROM php:8.1.2-fpm-alpine

RUN mkdir -p /project

WORKDIR /project

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer