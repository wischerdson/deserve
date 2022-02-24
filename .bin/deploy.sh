#! /bin/sh

# Удаляем неотслеживаемые файлы, если они есть и подтягиваем изменения из ветки master.
# Если есть конфликты, автоматически решаем их в пользу источника
git reset --hard
git fetch origin master
git merge --no-edit -s recursive -Xtheirs FETCH_HEAD

# Устанавливаем composer зависимости
php81 ~/composer.phar install --no-dev --no-interaction --no-progress --ignore-platform-req=ext-sodium
php81 ~/composer.phar dumpautoload -o

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
php81 artisan optimize -n
php81 artisan event:cache -n

# Обновляем работу очереди
sh $(dirname $0)/refresh-queue.sh
