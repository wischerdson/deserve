#! /bin/sh

set -eu

docker-compose -f docker-compose.yaml -f docker-compose.prod.yaml up --no-deps -d
