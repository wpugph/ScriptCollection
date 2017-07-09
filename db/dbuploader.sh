# Always run this inside wp-content foder with proper .ftpconfig setup
# only used to sync wp-contents and DB from local
# for uploading the whole project and initial setup use the wpUploadContentDb.hs script
# This should be run in a project folder instead of the scripts folder to run properly
# dont forget to update cfg-dbuploader.cfg
#ftpconfig destination folder should always in a wp installation root not in the wp-content
#
source cfg-dbuploader.cfg

# settings will be coming from a folder's .ftpconfog
folder_ftp_cfg() {
		FTP_SERVER=$(grep 'host' $PWD/.ftpconfig)
		FTP_SERVER=${FTP_SERVER#*: }
	FTP_SERVER=${FTP_SERVER:1:${#FTP_SERVER}-3}
# echo $FTP_SERVER
		FTP_USER=$(grep 'user' $PWD/.ftpconfig)
		FTP_USER=${FTP_USER#*: }
	FTP_USER=${FTP_USER:1:${#FTP_USER}-3}
# echo $FTP_USER
		FTP_PASS=$(grep 'pass' $PWD/.ftpconfig)
		FTP_PASS=${FTP_PASS#*: }
	FTP_PASS=${FTP_PASS:1:${#FTP_PASS}-3}
# echo $FTP_PASS
		FTP_UPLOAD_DEST=$(grep 'remote' $PWD/.ftpconfig)
		FTP_UPLOAD_DEST=${FTP_UPLOAD_DEST#*: }
	FTP_UPLOAD_DEST=${FTP_UPLOAD_DEST:1:${#FTP_UPLOAD_DEST}-3}
# echo $FTP_UPLOAD_DEST
}

# remove this function to load the settings from the cfg file
# if this is active, this will get the settings from .ftpconfig
folder_ftp_cfg

ITEMS_TO_UPLOAD=$PWD
#SQL_NAME=$DB_USER.sql
SQL_NAME=db.sql

# to be uploaded in root dir below the wp-content folder
FTP_UPLOAD_DEST=$FTP_UPLOAD_DEST/..

#prepare blank wpconfig file
printf "Destination $FTP_SERVER and dir: $FTP_UPLOAD_DEST "
printf "Proceed upload DB & WP-contents of $ITEMS_TO_UPLOAD (y/n) ?"
read PROCEED_UPLOAD

if [ "$PROCEED_UPLOAD" == "y" ]; then
	git archive -o $PROJECT_NAME.zip master

	wp search-replace $URL_LOC $URL_LIVE --export=$SQL_NAME
	zip $SQL_NAME.zip $SQL_NAME
	rm $SQL_NAME

	sed "s|$DB_NAME_DEF|$DB_NAME|g;s|$DB_USER_DEF|$DB_USER|g;s|$DB_PASS_DEF|$DB_PASS|g;s|$URL_LOC_DEF|$URL_LOC|g;s|$URL_LIVE_DEF|$URL_LIVE|g;" $SCRIPT_SOURCE/wpupdate.php> wpupdate.php


# # Add zip of wp
# # Add the db extractor
# ftp -n $FTP_SERVER <<END_SCRIPT
# quote USER $FTP_USER
# quote PASS $FTP_PASS
# binary
# #cd $FTP_UPLOAD_DEST
# put $SQL_NAME.zip $FTP_UPLOAD_DEST/$SQL_NAME.zip
# put $WP_SOURCE/wp.zip $FTP_UPLOAD_DEST/wp.zip
# put $PROJECT_NAME.zip $FTP_UPLOAD_DEST/wp-content.zip
# put wpextract.php $FTP_UPLOAD_DEST/wpextract.php
# put $SEARCH_SOURCE/search.zip $FTP_UPLOAD_DEST/search.zip
# put wp-configUP.php $FTP_UPLOAD_DEST/wp-config.php
# quit
# END_SCRIPT

ftp -n $FTP_SERVER <<END_SCRIPT
quote USER $FTP_USER
quote PASS $FTP_PASS
binary
#cd $FTP_UPLOAD_DEST
put $SQL_NAME.zip $FTP_UPLOAD_DEST/$SQL_NAME.zip
put $PROJECT_NAME.zip $FTP_UPLOAD_DEST/wp-content.zip
put wpupdate.php $FTP_UPLOAD_DEST/wpupdate.php
quit
END_SCRIPT

	printf "uploaded!"
	exit

fi

#add cleamup here for temp fles
