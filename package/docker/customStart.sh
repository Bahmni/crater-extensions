#!/bin/bash

set -e

./start.sh

php artisan db:seed --class=RolesTableSeeder --force
php artisan db:seed --class=CustomFieldsTableSeeder --force
