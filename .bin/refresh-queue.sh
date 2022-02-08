#! /bin/sh

SESSIONNAME="alt-deserve"

php81 artisan queue:restart

tmux has-session -t $SESSIONNAME &> /dev/null

if [ $? != 0 ]
then
	tmux new-session -d -s $SESSIONNAME 'php81 artisan queue:work'
fi
