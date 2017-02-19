#!/bin/bash

env > /app/public_html/.env
chown -R www-data:www-data /app/public_html/frontend/web/userfiles
chown -R www-data:www-data /app/public_html/frontend/web/media
/etc/init.d/apache2 start
tail -F /var/log/apache2/error.log
