#!/bin/bash
echo -e "Content-type: text/plain\r";
cd /var/www/domains/m.chats.qzo.su/ || exit > /dev/null
git reset --hard > /dev/null
git pull https://github.com/JimusHimus/Chats > /dev/null
chmod -R 755 /var/www/domains/m.chats.qzo.su
