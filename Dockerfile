FROM php:7.4-apache
 
RUN a2enmod rewrite
 
RUN apt-get update \
  && apt-get install -y libzip-dev git wget --no-install-recommends \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
 
RUN docker-php-ext-install pdo mysqli pdo_mysql zip;
 
RUN wget https://getcomposer.org/download/2.0.9/composer.phar \
    && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer
 
COPY docker/apache.conf /etc/apache2/sites-available/apache.conf

RUN a2ensite apache.conf \
    && a2dissite 000-default.conf \
    && service apache2 restart

COPY . /var/www/html
 
RUN composer install

WORKDIR /var/www/html

EXPOSE 8080
CMD ["apache2-foreground"]