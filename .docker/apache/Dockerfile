FROM php:7.2-apache

RUN apt-get update && \
    apt-get install -y git \
                       zlib1g-dev

RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require hirak/prestissimo

# xdebug
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# apt clean
RUN apt-get clean  && \
    rm -rf /var/lib/apt/lists/*

RUN mkdir /var/log/apache2/laracert55

# ssl certs
RUN openssl genrsa -out /etc/ssl/private/laracert55.key 2048
RUN openssl req -new -x509 -key /etc/ssl/private/laracert55.key -out /etc/ssl/certs/laracert55.crt -days 3650 -subj "/C=IT/O=NM/OU=NM/CN=laracert55"

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY laracert55.conf /etc/apache2/sites-available/laracert55.conf

COPY fix-directory-permissions /usr/local/bin/fix-directory-permissions
RUN chmod +x /usr/local/bin/fix-directory-permissions

RUN a2dissite 000-default.conf
RUN a2dissite default-ssl.conf
RUN a2ensite laracert55.conf

RUN /usr/sbin/a2enmod rewrite
RUN /usr/sbin/a2enmod ssl