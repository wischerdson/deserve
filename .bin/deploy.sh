#! /bin/sh

# Удаляем неотслеживаемые файлы, если они есть и подтягиваем изменения из ветки master
git reset --hard
git clean -fd
git fetch origin master
git merge --no-commit --no-edit -s recursive -Xtheirs origin/master
# git pull --quiet --no-commit --no-edit --prune -s ort -Xtheirs origin master

# Устанавливаем composer зависимости
php81 ~/composer.phar install --no-dev --no-interaction --no-progress --ignore-platform-req=ext-sodium

# Создаем символьные ссылки если их нет
if [ ! -h ./public_html ]
then
	ln -s $PWD/public $PWD/public_html
fi

if [ ! -h ./public/storage ]
then
	php81 artisan storage:link
fi

# Запускаем миграции и сидеры, если настроены переменные среды, иначе
# копируем их из env.example и генерируем ключ приложения
if [ -r .env ]
then
	php81 artisan migrate --force
	php81 artisan db:seed --force
else
	cp .env.example .env
	php81 artisan key:generate -n
	echo "==== Require to configure the environment variables! ===="
	exit 1
fi

# Обновляем кэши приложения
php81 artisan optimize:clear -n
php81 artisan route:cache -n
php81 artisan config:cache -n
php81 artisan event:cache -n
