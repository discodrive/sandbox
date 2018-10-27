FROM php:7.2.1-apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN apt-get update -qq && apt-get install -y --no-install-recommends build-essential libpq-dev nodejs git zip unzip libmagickwand-dev
WORKDIR /var/www/html
RUN docker-php-ext-install mysqli calendar
RUN pecl install imagick-3.4.3 && docker-php-ext-enable imagick
COPY composer.json /var/www/html/composer.json
COPY composer.lock /var/www/html/composer.lock
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"; \
    php composer-setup.php; \
    php -r "unlink('composer-setup.php');"; \
    mv composer.phar /usr/local/bin/composer;
COPY . /var/www/html
COPY php.ini /usr/local/etc/php/
RUN a2enmod rewrite
RUN service apache2 restart
