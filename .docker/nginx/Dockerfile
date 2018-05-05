FROM nginx:latest

RUN apt-get update && \
    apt-get install -y openssl

# apt clean
RUN apt-get clean  && \
    rm -rf /var/lib/apt/lists/*

# ssl certs
RUN mkdir /etc/nginx/ssl
RUN openssl genrsa -out /etc/nginx/ssl/laracert55.key 2048
RUN openssl req -new -x509 -key /etc/nginx/ssl/laracert55.key -out /etc/nginx/ssl/laracert55.crt -days 3650 -subj "/C=IT/O=NM/OU=NM/CN=laracert55"

RUN rm /etc/nginx/conf.d/default.conf
COPY laracert55.conf /etc/nginx/conf.d/laracert55.conf

COPY fix-directory-permissions /usr/local/bin/fix-directory-permissions
RUN chmod +x /usr/local/bin/fix-directory-permissions
