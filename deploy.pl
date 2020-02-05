#!/bin/bash
echo "Content-type: text/plain";
echo '';
chmod -R 755 /var/www/domains/m.chats.qzo.su
cd /var/www/domains/m.chats.qzo.su/ || exit > /dev/null
git reset --hard > /dev/null
git pull https://github.com/JimusHimus/Chats > /dev/null
