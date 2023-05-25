FROM php:8.0-apache as app

RUN a2enmod rewrite
RUN apt-get update -y && apt-get install -y
RUN docker-php-ext-install pdo pdo_mysql

ENV COMPOSER_ALLOW_SEPERUSER=1

COPY --from=composer:2.4 /usr/bin/composer  usr/bin/composer

COPY ./../composer.* ./

RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

COPY ./ /var/www/html/

RUN composer dump-autoload --optimize




FROM app as newInstaller

COPY --from=mlocati/php-extensioin-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN set -eux; \
    install-php-extensions pdo pdo_mysql

RUN a2enmod rewrite

ENV COMPOSER_ALLOW_SEPERUSER=1

COPY --from=composer:2.4 /usr/bin/composer  usr/bin/composer

COPY ./../composer.* ./

RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

COPY ./ /var/www/html/

RUN composer dump-autoload --optimize





FROM newInstaller as xdebugger

# multi staging 

