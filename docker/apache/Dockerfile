FROM httpd:alpine3.14

COPY ./config/httpd.conf /usr/local/apache2/conf/httpd.conf
COPY ./config/httpd-vhosts.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf
COPY ./.ssl/server.crt /usr/local/apache2/conf/server.crt
COPY ./.ssl/server.key /usr/local/apache2/conf/server.key

RUN mkdir -p /usr/local/apache2/logs

EXPOSE 80
