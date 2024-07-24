FROM php:8.3-fpm AS php

USER root
ENV PATH="/var/www/.composer/vendor/bin:$PATH"
ENV PHP_MEMORY_LIMIT=512M
WORKDIR /var/www/html
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin

RUN apt-get update \
    && apt install -y git ffmpeg jq iputils-ping poppler-utils wget \
    && rm -rf /var/lib/apt \
    && chmod +x /usr/local/bin/install-php-extensions && sync
    
RUN install-php-extensions gd bcmath mbstring opcache xsl zip ssh2 yaml pcntl intl exif redis pdo_mysql @composer \
    && groupmod -og 1000 www-data \
    && usermod -u 1000 www-data
    
COPY build/php_entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh \
    && chown -R www-data:www-data /var/www/html \
    && chown -R www-data:www-data /var/www

USER www-data

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-progress --no-scripts
COPY --chown=www-data:www-data . .
RUN  mkdir -p /var/www/html/storage/logs /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && composer run-script post-autoload-dump

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]


### npm ###
FROM node AS npm
WORKDIR /var/www/html

ARG VITE_APP_NAME
ARG VITE_PUSHER_APP_KEY
ARG VITE_PUSHER_HOST
ARG VITE_PUSHER_PORT
ARG VITE_PUSHER_PORT_SECURE
ARG VITE_PUSHER_SCHEME
ARG VITE_PUSHER_APP_CLUSTER
ARG VITE_PUSHER_APP_HOST

# set node user and group id
RUN groupmod -og 1000 node \
    && usermod -u 1000 -g 1000 -d /var/www node \
    && chown -R node:node /var/www

USER node

COPY --from=php /var/www/html /var/www/html

RUN rm -rf /var/www/.npm \
    && npm install \
    && npm run build
 
### production
FROM php AS production
COPY --from=npm /var/www/html/public /var/www/html/public

### nginx ###
FROM nginx AS nginx
COPY build/nginx.conf /etc/nginx/templates/default.conf.template
COPY --from=npm /var/www/html/public /var/www/html/public

