FROM php:8.2-cli
WORKDIR /app
RUN apt-get update \
    && apt-get install -y git unzip \
    && rm -rf /var/lib/apt/lists/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
