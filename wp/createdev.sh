#!/bin/bash
# quick create local

# Enough with settings, start creating the site
# wp core download --locale=en_CA
wp core download --locale=en_CA

wp core config --path=$PWD --dbname=$DB_NAME --dbuser=$DB_USER --dbpass=$DB_PASS --extra-php <<PHP
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_MEMORY_LIMIT', '256M');
PHP

wp core install --url=$LOCAL_URL --title="${SITE_NAME}" --admin_user=$WP_ADMIN --admin_password=$WP_PASS --admin_email=$WP_EMAIL

#wp core install --url=cnrsys.com --title=CarlAlberto --admin_user=cnradmin --admin_password=P8yf4tius4t2 --admin_email=cralberto11@gmail.com

#ok inside single
#wp core install --url=cnrsys.com --title='Carl Alberto' --admin_user=cnradmin --admin_password=P8yf4tius4t2 --admin_email=cralberto11@gmail.com
#ok
#wp core install --url=cnrsys.com --title="Carl Alberto" --admin_user=cnradmin --admin_password=P8yf4tius4t2 --admin_email=cralberto11@gmail.com
