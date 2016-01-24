cd ~
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
cd /var/www/html
composer create-project laravel/laravel .
chown -R nginx:nginx /var/www/html
chmod -R 775 /var/www/html/storage