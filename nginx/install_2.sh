echo 'deb http://nginx.org/packages/mainline/ubuntu/ trusty nginx' >> /etc/apt/sources.list
echo 'deb-src http://nginx.org/packages/mainline/ubuntu/ trusty nginx' >> /etc/apt/sources.list
wget -q -O- http://nginx.org/keys/nginx_signing.key | sudo apt-key add -

apt-get update
apt-get -y install nginx php7.0 php7.0-mysql php7.0-fpm
