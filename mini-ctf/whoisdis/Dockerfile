FROM php:7.3-apache

RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get -y --no-install-recommends install whois netbase

COPY src/ /var/www/html/

COPY flag.txt /var/www/html/normalementhedhalitlawijaalihntyraw
RUN chmod 444 /var/www/html/normalementhedhalitlawijaalihntyraw

WORKDIR /var/www/html

RUN chown -R root:root /var/www/html
RUN chmod 444 normalementhedhalitlawijaalihntyraw