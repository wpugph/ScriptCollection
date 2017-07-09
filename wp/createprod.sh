#!/bin/bash
# quick create local

# Enough with settings, start creating the site
# wp core download --locale=en_CA
wp core download --locale=en_CA

wp core config --path=$PWD --dbname=$DB_USER --dbuser=$DB_USER --dbpass=$DB_PASS --extra-php <<PHP
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_MEMORY_LIMIT', '256M');
PHP

wp core install --url=$LOCAL_URL --title=${SITE_NAME} --admin_user=$WP_ADMIN --admin_password=$WP_PASS --admin_email=$WP_EMAIL
