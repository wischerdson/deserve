FROM httpd:alpine3.14

COPY ./config/httpd.conf /usr/local/apache2/conf/httpd.conf
COPY ./config/httpd-vhosts.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf

RUN mkdir -p /usr/local/apache2/logs

EXPOSE 80
