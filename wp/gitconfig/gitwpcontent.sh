#!/bin/bash
# setup git innitially in the wpcontent folder

GITDIR="wp-content"
GITPATH=$PWD/$GITDIR

cd $PWD/$GITDIR

git init

cp $MYSCRIPTFOLDER/commonhiddenfiles/.gitignoreRENAME $GITPATH/.gitignore

git remote add origin $GIT_URL

git add *
git add .

git commit -m "initial files"

git push -u origin master
