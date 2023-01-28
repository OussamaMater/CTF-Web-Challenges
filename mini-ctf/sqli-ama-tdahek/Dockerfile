FROM ubuntu:18.04

ENV TZ=Africa/Tunis

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && apt update && DEBIAN_FRONTEND=noninteractive apt install -y apache2 \
    php \
    libapache2-mod-php \
    php-mysql

ENTRYPOINT service apache2 start && /bin/bash
