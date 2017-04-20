#!/bin/bash

        echo DB_HOST $DB_HOST
        echo DB_USER_NAME $DB_USER_NAME
        echo DB_PASSWORD $DB_PASSWORD
        echo DB_NAME $DB_NAME
        mysql -h $DB_HOST -u $DB_USER_NAME -p$DB_PASSWORD -e "drop database $DB_NAME;"
        mysql -h $DB_HOST -u $DB_USER_NAME -p$DB_PASSWORD -e "create database $DB_NAME;"
        mysql -h $DB_HOST -u $DB_USER_NAME -p$DB_PASSWORD $DB_NAME < /dump/lykke-city.sql
