FROM php:8.1-fpm-alpine

RUN apk --update --no-cache add git

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD composer install ; php-fpm 

EXPOSE 8000