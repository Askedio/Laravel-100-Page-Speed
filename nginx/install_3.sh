echo ‘cgi.fix_pathinfo=0’ >> /etc/php/7.0/fpm/php.ini
sed -i 's/www-data/nginx/g' /etc/php/7.0/fpm/pool.d/www.conf

/etc/init.d/nginx restart
/etc/init.d/php7.0-fpm restart