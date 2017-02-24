#!/bin/sh

cd /app/public_html
#ln -s console app
#/app/public_html/vendor/bin/yii migrate --interactive=0
php /app/public_html/yii migrate/down --interactive=0
