#!/bin/bash

env > /app/public_html/.env
/etc/init.d/apache2 start
tail -F /var/log/apache2/error.log
