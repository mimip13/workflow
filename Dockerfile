FROM phpmyadmin

RUN apt-get update \
    && apt-get install -y \
       && a2enmod rewrite \
       && docker-php-ext-install pdo pdo_mysql
