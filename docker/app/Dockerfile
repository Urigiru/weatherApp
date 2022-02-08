FROM php:7.4-cli
COPY ./app /usr/src/weatherApp/app
COPY ./bootstrap /usr/src/weatherApp/bootstrap
COPY ./composer* /usr/src/weatherApp/
COPY ./weather.php /usr/src/weatherApp/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
WORKDIR /usr/src/weatherApp
RUN printf '#!/bin/bash\nphp weather.php "$@"' > /usr/bin/weather && \
    chmod +x /usr/bin/weather
RUN apt-get update && apt-get install -y git zip unzip
RUN composer install --no-dev
WORKDIR /usr/src/weatherApp