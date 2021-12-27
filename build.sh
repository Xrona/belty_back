#!/bin/sh
set -e

export $(egrep -v '^#' .env | xargs)

docker build -t mediaten/php:"8.0-fpm" -t mediaten/php:latest --build-arg PHP_BASE_IMAGE_VERSION="8.0-fpm" ./docker/php/