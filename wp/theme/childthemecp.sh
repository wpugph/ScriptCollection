#!/bin/bash
# Used to quickly install a theme in a current wp
# usually for evaluation purposes

#sample theme
#PARENT_THEME="https://wordpress.org/themes/download/rastro-restaurant.1.0.6.zip?nostats=1"

cp -r $CHILD_THEME $PWD/wp-content/themes/$CHILD_THEME_NAME
