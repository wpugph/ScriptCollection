#!/bin/bash

mysql -uroot -p${DB_ROOT_PASS} -e "DROP DATABASE ${WPDBNAME};"

echo "deleted $WPDBNAME"

mysql -uroot -p${DB_ROOT_PASS} -e "DROP USER '${WPDBUSER}'@'localhost';"
mysql -uroot -p${DB_ROOT_PASS} -e "DROP USER '${WPDBUSER}'@'%';"

# below asks again for the password
# mysqladmin -uroot -p${DB_ROOT_PASS} DROP USER `${WPDBUSER}`@`localhost`
# mysqladmin -uroot -p${DB_ROOT_PASS} DROP USER `${WPDBUSER}`@`%`


echo "deleted user: $WPDBUSER"
