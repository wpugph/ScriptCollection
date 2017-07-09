#!/bin/bash

SQL_NAME=db.sql

cd $PWD/wp-content
git archive -o wp-content.zip release

cd ..
wp search-replace $LOCAL_URL $LIVE_URL --export=$SQL_NAME
zip $SQL_NAME.zip $SQL_NAME
rm $SQL_NAME
