#!/bin/bash
# checks WP coding standards
# see https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards

# for ignoring files https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage

# ignore whole folders
# --ignore=*/tests/*,*/data/*

# ignore single files whichever folder they are located,
# --ignore=bootstrap.css

#correct
#--ignore=bootstrap.css,*/bootstrap.css,/template-parts/slider-text.php

if [ -z "$IGNORELIST" ]
then
	IGNORELIST="bootstrap.css,font-awesome.css"
fi

phpcs --standard=WordPress $PWD --ignore=$IGNORELIST
