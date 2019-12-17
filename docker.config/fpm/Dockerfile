FROM php:7.1-fpm

RUN apt-get update \
        && docker-php-ext-install pdo_mysql

RUN apt-get update

RUN apt-get install -y curl

# Install composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# Install PHP_CodeSniffer
#RUN composer global require "squizlabs/php_codesniffer=*"

#RUN curl -sL https://deb.nodesource.com/setup_9.x | echo -E bash -
#RUN apt-get install -y nodejs npm

#Install NVM Script
RUN curl -sSL https://raw.githubusercontent.com/nvm-sh/nvm/v0.34.0/install.sh | sh
#RUN nvm install 8.10.0