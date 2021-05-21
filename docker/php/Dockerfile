FROM php:fpm

RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apt-get update && apt-get install -y git zip unzip vim npm ruby ruby-dev libsqlite3-dev

RUN npm install n -g 
RUN n latest

RUN gem install mailcatcher

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_mysql pdo_pgsql

WORKDIR /var/www/html
