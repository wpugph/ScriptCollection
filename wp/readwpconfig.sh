#!/bin/bash

WPDBNAME=`cat $PWD/wp-config.php | grep DB_NAME | cut -d \' -f 4`
WPDBUSER=`cat $PWD/wp-config.php | grep DB_USER | cut -d \' -f 4`
WPDBPASS=`cat $PWD/wp-config.php | grep DB_PASSWORD | cut -d \' -f 4`

echo $WPDBNAME
