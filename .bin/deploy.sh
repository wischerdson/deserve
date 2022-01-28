#! /bin/bash

# Удаляем неотслеживаемые файлы, если они есть и подтягиваем изменения из ветки master
git reset --hard
git pull origin master

# Устанавливаем composer зависимости
php80 ~/composer.phar install --no-dev --no-interaction --no-progress

# Создаем символьные ссылки если их нет
if [ ! -h ./public_html ]
then
	ln -s $PWD/public $PWD/public_html
fi

if [ ! -h ./public/storage ]
then
	php80 artisan storage:link
fi

# Запускаем миграции и сидеры, если настроены переменные среды, иначе
# копируем их из env.example и генерируем ключ приложения
if [ -r .env ]
then
	php80 artisan migrate --force
	php80 artisan db:seed --force
else
	cp .env.example .env
	php80 artisan key:generate -n
	echo "==== Require to configure the environment variables! ===="
	exit 1
fi

# Обновляем кэши приложения
php80 artisan route:cache -n
php80 artisan config:cache -n
php80 artisan view:cache -n
