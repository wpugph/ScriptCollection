#!/bin/bash

ftp -n $FTP_SERVER <<END_SCRIPT
quote USER $FTP_USER
quote PASS $FTP_PASS
binary
cd $FTP_REMOTEPATH
put $SQL_NAME.zip $FTP_REMOTEPATH/$SQL_NAME.zip
put $PWD/wp-content/wp-content.zip $FTP_REMOTEPATH/wp-content.zip
put $PWD/wpextract.php $FTP_REMOTEPATH/wpextract.php
quit
END_SCRIPT

# unlink the wp
