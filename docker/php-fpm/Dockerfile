FROM php:7.2.22-fpm-stretch

RUN apt-get update && apt-get install -y \
mc \
vim \
curl \
wget \
git \
libfreetype6-dev \
libjpeg62-turbo-dev \
libxslt-dev \
libicu-dev \
libmcrypt-dev \
libreadline-dev \
libpng-dev \
libxml2-dev \
libmemcached-dev \
&& docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd

RUN pecl install mcrypt-1.0.1
RUN docker-php-ext-enable --ini-name pecl.ini mcrypt
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install xsl
RUN docker-php-ext-install soap
RUN docker-php-ext-install sockets
RUN docker-php-ext-install bcmath
RUN docker-php-ext-enable bcmath


RUN pecl install -o -f xdebug \
&& docker-php-ext-enable xdebug
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN pecl install -o -f memcached \
    && docker-php-ext-enable memcached

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer






ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www
CMD ["php-fpm"]
