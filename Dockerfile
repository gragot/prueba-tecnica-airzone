FROM php:7.4.1-apache
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
