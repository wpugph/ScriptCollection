#!/bin/bash

# WP cli cleanup script
wp widget delete recent-posts-1 archives-1 categories-1 meta-1
wp widget delete recent-posts-2 archives-2 categories-2 meta-2
wp post delete 1
wp theme delete twentyfifteen
wp theme delete twentysixteen

wp plugin uninstall akismet
wp plugin uninstall hello
wp plugin install simple-custom-admin
