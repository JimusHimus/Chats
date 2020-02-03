#!/bin/bash
echo "Content-type: text/plain\n";
echo '';
cd /var/www/domains/m.chats.qzo.su/ || exit > /dev/null
git reset --hard > /dev/null
git pull https://github.com/JimusHimus/Chats > /dev/null
