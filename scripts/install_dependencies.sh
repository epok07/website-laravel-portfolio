#!/bin/bash
# Dependancy install (code deploy global variables)
sudo yum install -y httpd

# var declaration (code deploy defines DEPLOYMENT_GROUP_NAME)
#DEPLOYMENT_GROUP_NAME=FinAviva-Dev-group

cd /var/www/html/Personal-Website
echo $PWD
sudo composer install
sudo cp .env.example .env

#Read .env File, we need database name
set -a
	. /var/www/html/Personal-Website/.env
set +a

#Save DB incase it already exists with date
today=`date '+%Y_%m_%d__%H_%M_%S'`;
mysqldump --databases $DB_DATABASE > /var/www/html/Personal-Website/database/$today.db

#migrate new
sudo php artisan migrate:fresh --seed
sudo php artisan key:generate
#sudo npm install --unsafe-perm

#give permission to the public directory
#so that the npm could run on it
sudo chmod 777 ./public -R
npm run production

#Permissions
sudo chmod 777 ./storage/logs -R
sudo chmod 777 ./bootstrap/cache -R
sudo chmod 777 ./storage/framework/sessions -R
sudo chmod 777 ./storage/framework/cache -R
sudo chmod 777 ./storage/framework/views -R
sudo chmod 777 ./resources/views -R
