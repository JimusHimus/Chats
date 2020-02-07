#!/bin/bash
echo -e "Content-type: text/plain\n";
cd /var/www/domains/m.chats.qzo.su/ || exit > /dev/null
git reset --hard 4691ab095f79ab4d65ff782de3b81c8bfb587516 > /dev/null
git pull https://github.com/JimusHimus/Chats > /dev/null
chmod -R 755 /var/www/domains/m.chats.qzo.su
