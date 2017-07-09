#!/bin/bash
# only used for local, put stronger creds for live

mysql -uroot -p${DB_ROOT_PASS} -e "CREATE DATABASE ${DB_NAME} /*\!40100 DEFAULT CHARACTER SET utf8 */;"
mysql -uroot -p${DB_ROOT_PASS} -e "CREATE USER ${DB_USER}@localhost IDENTIFIED BY '${DB_PASS}';"
mysql -uroot -p${DB_ROOT_PASS} -e "GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${DB_USER}'@'localhost';"
mysql -uroot -p${DB_ROOT_PASS} -e "FLUSH PRIVILEGES;"
