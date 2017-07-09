#!/bin/bash
# checks WP coding standards
# see https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards

phpcbf --standard=WordPress $PWD
