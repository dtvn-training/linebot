# Sử dụng hình ảnh PHP phiên bản mong muốn làm cơ sở
FROM php:latest

WORKDIR /var/www/html

# Cài đặt các gói cần thiết
RUN apt-get update && apt-get install -y \
    git \
    unzip \
 && rm -rf /var/lib/apt/lists/*

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Tải và cài đặt Rector
RUN composer global require rector/rector --prefer-dist --no-progress --no-suggest --classmap-authoritative


