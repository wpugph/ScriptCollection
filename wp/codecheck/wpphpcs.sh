# PHPCS is now configured in the bash_profile
# check current folder

# Whitelisting config
# see https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/wiki/Whitelisting-code-which-flags-errors

phpcs --standard=WordPress $PWD

# Autocorrect
phpcbf --standard=WordPress $PWD
