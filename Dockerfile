# INCOMPLETE - Docker implementation: Soon, maybe :)

# Usar la imagen oficial de PHP con Apache
FROM php:8.0-apache

# Instalar las extensiones necesarias para SQL Server
RUN apt-get update && apt-get install -y \
    unixodbc-dev \
    && pecl install pdo_sqlsrv \
    && docker-php-ext-enable pdo_sqlsrv

# Copiar el código de la aplicación al contenedor
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80



