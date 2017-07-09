#!/bin/bash
# creates an ftp config in the root project folder
# ftpconfig always go to the root folder
# git always go to the wp-content folder

FTP_SERVER_DEF="FTP_SERVER"
FTP_USER_DEF="FTP_USER"
FTP_PASS_DEF="FTP_PASS"
FTP_DEFDIR="FTP_LOCPATH"
FTP_DEFRDIR="FTP_REMOTEPATH"

cp $MYSCRIPTFOLDER/commonhiddenfiles/.ftpconfigBLANK $PWD/.ftpconfigTMP

cp $MYSCRIPTFOLDER/commonhiddenfiles/.ftpignore $PWD/.ftpignore

sed "s|$FTP_SERVER_DEF|$FTP_SERVER|g;s|$FTP_USER_DEF|$FTP_USER|g;s|$FTP_PASS_DEF|$FTP_PASS|g;s|$FTP_DEFRDIR|$FTP_REMOTEPATH|g;s|$FTP_DEFDIR|$FTP_LOCPATH|g" .ftpconfigTMP> .ftpconfig
rm .ftpconfigTMP
