FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crea un usuario no root
RUN useradd -m appuser

# Cambia al usuario root para crear el directorio y asignar permisos
USER root

# Crear un directorio de trabajo y establecer permisos
RUN mkdir -p /var/www && chown -R appuser /var/www

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia los archivos de tu proyecto
COPY . .

# Eliminar el directorio vendor si existe
RUN rm -rf /var/www/vendor
RUN rm -rf /var/www/composer.lock

# Limpia el caché de Composer
RUN composer clear-cache

# RUN chown -R appuser:appuser /var/www/vendor
# Cambia al usuario no root
RUN chown -R appuser:appuser /var/www

USER appuser

# Instala las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Restablece al usuario root si es necesario para más operaciones
USER root

CMD ["php-fpm"]

EXPOSE 9000
