#!/bin/bash
# Used to quickly install a theme in a current wp
# usually for evaluation purposes

#sample theme
#PARENT_THEME="https://wordpress.org/themes/download/rastro-restaurant.1.0.6.zip?nostats=1"


wp theme install $PARENT_THEME --force --activate
