FROM php:8-fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/html/tools/rector

WORKDIR /var/www/html/tools/rector
RUN touch entryfile.txt
RUN cat entryfile.txt

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN delgroup dialout

RUN addgroup -g ${GID} --system laravel
RUN adduser -G laravel --system -D -s /bin/sh -u ${UID} laravel

RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

USER laravel

CMD ["sh", "-c", "composer install"]

