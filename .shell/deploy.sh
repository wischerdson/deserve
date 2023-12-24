#!/usr/bin/env bash

set -eu

YELLOW_BG='\033[43m'
YELLOW_FG='\033[43m'
BLACK_FG='\033[30m'
NC='\033[0m'

if [ ! $# -eq 0 ]
then
	branch=$1
	commit=$2

	echo -e "${YELLOW_FG}target branch: $branch${NC}"
	echo -e "${YELLOW_FG}commit sha: $commit$branch${NC}"

	echo -e "\n${YELLOW_BG}${BLACK_FG}   Retrieving source code ($commit)   ${NC}"

	git reset --hard
	git clean -fd
	git checkout "$branch" -f
	git fetch origin "$branch"
	git checkout "$commit" -f
fi

echo -e "\n${YELLOW_BG}${BLACK_FG}   Installing composer dependencies excluding DEV dependencies   ${NC}"
./corn composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
rm -f ./bootstrap/cache/packages.php
rm -f ./bootstrap/cache/services.php
./corn art package:discover

# Создаем символьные ссылки если их нет
if [ ! -h ./public/storage ]
then
	./corn artisan storage:link
fi

echo -e "\n${YELLOW_BG}${BLACK_FG}   Applying migrations   ${NC}"
./corn artisan migrate --force

echo -e "\n${YELLOW_BG}${BLACK_FG}   Data seeding   ${NC}"
./corn artisan db:seed --force

echo -e "\n${YELLOW_BG}${BLACK_FG}   Fresh cache   ${NC}"
./corn artisan optimize -n
./corn artisan event:cache -n

echo -e "\n${YELLOW_BG}${BLACK_FG}   Queue restarting   ${NC}"
./corn artisan queue:restart

if [ -n `docker-compose ps -q nginx` ] && [ -n `docker ps -q --no-trunc | grep $(docker-compose ps -q nginx)` ]
then
	echo -e "\n${YELLOW_BG}${BLACK_FG}   NGINX config reloading   ${NC}"
	./corn exec nginx nginx -s reload
fi

echo -e "\n${YELLOW_BG}${BLACK_FG}   Frontend rebuilding   ${NC}"
./corn npm install --no-audit
./corn npm run generate
if [ -n `docker-compose ps -q nodejs` ] && [ -n `docker ps -q --no-trunc | grep $(docker-compose ps -q nodejs)` ]
then
	./corn restart nodejs
fi
