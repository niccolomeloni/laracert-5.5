FROM php:7.2-fpm

RUN apt-get update && \
    apt-get install -y git \
                       libpq-dev \
                       zlib1g-dev

RUN docker-php-ext-install pdo \
                           pdo_pgsql \
                           zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require hirak/prestissimo

# xdebug
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# apt clean
RUN apt-get clean  && \
    rm -rf /var/lib/apt/lists/*

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini