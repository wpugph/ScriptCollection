#!/bin/bash

ftp -n $FTP_SERVER <<END_SCRIPT
quote USER $FTP_USER
quote PASS $FTP_PASS
binary
cd $FTP_REMOTEPATH
put $PWD/wpextract.php $FTP_REMOTEPATH/wpextract.php
quit
END_SCRIPT

# unlink the wp
