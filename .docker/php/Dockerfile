FROM php:8.0-fpm

COPY ./php/scripts/ /tmp/scripts/

RUN chmod +x -R /tmp/scripts/

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql

ENTRYPOINT ["/tmp/scripts/init.sh"]

EXPOSE 9000

CMD ["php-fpm"]
