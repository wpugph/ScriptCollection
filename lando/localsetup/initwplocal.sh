#!/bin/bash.

. $PWD/new.cfg

# define your terminus executable path
PATH=$PATH:/bin:/usr/bin:/home/carl/terminus/vendor/bin
export PATH

lando init --recipe wordpress --webroot . --name $SITENAME
# lando start
# lando wp core install --url=http://$LOCALNAME.lndo.site --title="$SITENAME" --admin_user=$USERNAME --admin_password="$PASSWORD" --admin_email="$EMAIL"

lando start

lando composer install

pwd

$PWD

lando wp core config --path='$PWD/web' --dbname=$DB_NAME --dbuser=$DB_USER --dbpass=$DB_PASS --extra-php <<PHP
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_MEMORY_LIMIT', '256M');
PHP

lando wp core install --path='$PWD/web' --url=http://$LOCALNAME.lndo.site --title="$SITENAME" --admin_user=$USERNAME --admin_password="$PASSWORD" --admin_email="$EMAIL"


# remove wp componenets
lando wp widget delete recent-posts-1 recent-posts-2 archives-1 archives-2 categories-1 categories-2 meta-1 meta-2 search-1 search-2
lando wp theme delete twentyfifteen twentysixteen twentyfourteen twentythirteen twentytwelve twentyeleven twentytend
lando wp plugin uninstall akismet hello
lando wp post delete 1 2 3 4 5 -- force

#initialize othe environments
#terminus auth:login --email=$EMAIL --machine-token=$MACHINETOKEN
#terminus env:deploy $PANTHEONNAME.test --updatedb --note="Initialize the Test environment"
#terminus env:deploy $PANTHEONNAME.live  --updatedb --note="Initialize the Live environment"

#TODO: setup composer

#TODO: add custom plugins here

#TODO: add commit
