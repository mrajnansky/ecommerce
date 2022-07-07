#!/bin/bash
RUN composer install
RUN php artisan key:generate
RUN php artisan migrate

