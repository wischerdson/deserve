#! /bin/sh

SESSIONNAME="alt-deserve"

php81 artisan queue:restart

tmux kill-session -t $SESSIONNAME
tmux new-session -d -s $SESSIONNAME 'php81 artisan queue:work'
