# AI

<h3><b>Requirements:</b></h3><br/>
    
    PHP: 8.1.*

<h3><b>Install npm: </b></h3><br/>

<code>npm install --save-dev vite</code>

<code>npx vite build</code>

<h3><b>Installation steps:</b></h3><br/>

<code>git clone  https://github.com/azimbekxaydarov946/ai.git</code>

<code>cd ai</code>

<code>composer update</code>

<code>copy .env.example to .env</code>

<code>creae db</code>

<code>write db credentials to .env file</code>

<code>php artisan migrate:fresh</code>

<code>php artisan optimize</code>

<code>php artisan serve</code>



    2  apt install php8.2-fpm php8.2-mysql php8.2-curl phpunit php8.2-mbstring npm -y
    3  apt install nginx
    4  apt install composer
    5  cd /var/www/
    6  git clone  https://github.com/azimbekxaydarov946/ai.git
    7  cd ai/
    9  npm install --save-dev vite
   10  npx vite build
   11  composer update
   12  wget https://dev.mysql.com/get/mysql-apt-config_0.8.34-1_all.deb
   13  apt install gnupg
   14  dpkg -i mysql-apt-config_0.8.34-1_all.deb 
   15  apt update
   16  apt install mysql-server
   18  cp .env.example .env
   19  nano.env
   21  php artisan migrate:fresh
   22  mysql -u root -p
        create database ai;
        show databases;
   23  nano .env
        DB_DATABASE="ai"
        DB_USERNAME=root
        DB_PASSWORD="!@#QWEasdzxc"
   24  php artisan migrate:fresh
   27  php artisan migrate:fresh
   28  php artisan optimize
   29  php artisan serve
   30  nano /etc/nginx/sites-available/ai 
        server {
            listen 80;

            root /var/www/ai/public;

            index index.php index.html index.htm index.nginx-debian.html;

            server_name 192.168.100.233;

            location / {
                try_files $uri $uri/ /index.php?$query_string;
            }

            location ~ \.php$ {
                include snippets/fastcgi-php.conf;

                fastcgi_pass unix:/run/php/php8.2-fpm.sock;

            #	fastcgi_pass 127.0.0.1:9000;
            }

            location ~ /\.ht {
                deny all;
            }
        }
   34  nginx -t
   35  nginx -s reload
   36  cd /var/www/ai
   37  chown -R www-data:www-data ai/
   46  php artisan optimize
   47  php artisan key:generate
   49  php artisan config:clear
   50  php artisan cache:clear
   51  php artisan optimize


