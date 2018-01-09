# Imagen a usar 
FROM ubuntu:17.04

# Persona quien creo la receta o imagen. 
MAINTAINER Freddy Javier Frere Quintero <javierfrereq@gmail.com>

#Ejecutar comandos dentro del contenedor. 
RUN apt-get update
RUN apt-get -y install apache2
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*
RUN /usr/sbin/a2dismod 'mpm_*' 
RUN /usr/sbin/a2enmod mpm_prefork

RUN apt-get update
RUN apt-get -y install php php-mysql libapache2-mod-php 
RUN apt-get clean 
RUN rm -r /var/lib/apt/lists/*

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

RUN /usr/sbin/a2ensite default-ssl
RUN /usr/sbin/a2enmod ssl

# Puerto para conectarnos
EXPOSE 22 80 443 

# Devolvemos el status "OK"
RUN rm /var/www/html/index.html
COPY contenedores/index.php /var/www/html/
COPY contenedores/index.php /var/www/html/status/

# Inicializar el contenedor apartir de la imagen
# CMD /usr/sbin/apache2ctl -D FOREGROUND 

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]


