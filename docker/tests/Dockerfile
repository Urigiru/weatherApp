FROM php:7.4-cli
COPY . /usr/src/weatherApp
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY ./app /usr/src/weatherApp/app
COPY ./bootstrap /usr/src/weatherApp/bootstrap
COPY ./composer* /usr/src/weatherApp/
COPY ./weather.php /usr/src/weatherApp/
COPY ./tests /usr/src/weatherApp/tests
WORKDIR /usr/src/weatherApp
RUN printf '#!/bin/bash\n vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php  tests/phpunit/' > /usr/bin/run-tests && \
    chmod +x /usr/bin/run-tests
RUN apt-get update && apt-get install -y git zip unzip
RUN composer install
RUN vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests/phpunit/