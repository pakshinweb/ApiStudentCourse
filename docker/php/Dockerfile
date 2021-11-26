FROM php:8.0.13-fpm

ARG user

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zip \
        unzip \
        postgresql

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql  pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /usr/share/nginx/html/

RUN groupadd $user

RUN useradd -g $user -p q1o2e3e3r4 $user

RUN chown $user:$user -R .

USER $user