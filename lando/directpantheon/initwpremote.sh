#!/bin/bash.

. $PWD/new.cfg

# define your terminus executable path
PATH=$PATH:/bin:/usr/bin:/home/carl/terminus/vendor/bin
export PATH

# Authenticate your terminus auth:login
terminus auth:login --email=$EMAIL --machine-token=$MACHINETOKEN  --yes

terminus site:create $PANTHEONNAME "$SITENAME" WordPress
# add --org to associate with posibly my id a9b08d94-b907-4dcb-8aec-fd0780453929

#install core WP
terminus wp $PANTHEONNAME.dev -- core install --url=https://dev-$PANTHEONNAME.pantheonsite.io --title="$SITENAME" --admin_user=$USERNAME --admin_password="$PASSWORD" --admin_email="$EMAIL"

## TODO: Install WordPress without disclosing admin_password to bash history
# wp core install --url=example.com --title=Example --admin_user=supervisor --admin_email=info@example.com --prompt=admin_password < admin_password.t$

# remove wp componenets
terminus wp $PANTHEONNAME.dev widget delete recent-posts-1 recent-posts-2 archives-1 archives-2 categories-1 categories-2 meta-1 meta-2 search-1 search-2
terminus wp $PANTHEONNAME.dev theme delete twentyfifteen twentysixteen twentyfourteen twentythirteen twentytwelve twentyeleven twentyten
terminus wp $PANTHEONNAME.dev plugin uninstall akismet hello
terminus wp $PANTHEONNAME.dev post delete 1 2 3 4 5 -- force

#initialize othe environments
terminus auth:login --email=$EMAIL --machine-token=$MACHINETOKEN
terminus env:deploy $PANTHEONNAME.test --updatedb --note="Initialize the Test environment"
terminus env:deploy $PANTHEONNAME.live  --updatedb --note="Initialize the Live environment"

#TODO: setup composer

#TODO: add custom plugins here

#TODO: add commit
