FROM ubuntu:latest

# Expose apache.
EXPOSE 1050

# Manually set up the apache environment variables
ENV  APACHE_RUN_USER www-data
ENV  APACHE_RUN_GROUP www-data
ENV  APACHE_LOG_DIR /var/log/apache2
ENV  APACHE_LOCK_DIR /var/lock/apache2
ENV  APACHE_PID_FILE /var/run/apache2.pid

# Install apache, PHP, and supplimentary programs. openssh-server, curl, and lynx-cur are for debugging the container.
RUN  apt-get update && apt-get -y upgrade && DEBIAN_FRONTEND=noninteractive apt-get -y install \
     apache2
RUN add-apt-repository ppa:ondrej/php
RUN apt-get install php7.0 php7.0-mysql libapache2-mod-php7.0 curl lynx-cur
    
# Enable apache mods.
RUN  a2enmod php7.0
RUN  a2enmod rewrite

# Update the PHP.ini file, enable <? ?> tags and quieten logging.
RUN  sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/7.0/apache2/php.ini
RUN  sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php/7.0/apache2/php.ini



# Copy this repo into place.
ADD  www /var/www/site/
ADD  conf/ports.conf /etc/apache2/ports.conf
           
# Update the default apache site with the config we created.
ADD  conf/apache-config.conf /etc/apache2/sites-enabled/000-default.conf
         
# By default start up apache in the foreground, override with /bin/bash for interative.
ADD  /sbin/entrypoint.sh /etc/apache2/entrypoint.sh
RUN  chmod 755 /etc/apache2/entrypoint.sh 
RUN  /etc/init.d/entrypoint.sh

# 
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN chgrp -R 0 /etc/apache2 /var/log/apache2 /var/www /etc/php && chmod -R 777 /etc/apache2 /var/log/apache2 /var/www /etc/php
USER www-data
