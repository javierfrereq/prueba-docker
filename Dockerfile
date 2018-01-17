
FROM php:7.0-apache

MAINTAINER Freddy Javier Frere Quintero <javierfrereq@gmail.com>
WORKDIR / app

RUN apt-get update

EXPOSE 22 80 443 

COPY contenedores/index.php /usr/local/etc/php
COPY src/ /var/www/html/

CMD ["index.php"]

