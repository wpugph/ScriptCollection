#!/bin/bash

# import themexml

wp plugin install wordpress-importer --activate
wp plugin install debug-bar --activate
wp plugin install theme-check --activate
wp plugin install wordpress-beta-tester --activate
wp plugin install jetpack --activate

wp import $MYSCRIPTFOLDER/lib/wp/theme/sampledata/themereview.xml --authors=create
