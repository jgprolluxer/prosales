#!/bin/bash

rsync -rtv -e ssh --exclude='tmp' --exclude='webroot/files' --exclude='webroot/pagespeed' ./app/ root@166.78.26.157:/public_html/prosales/app/

echo Prosales Sandbox Updated # tell the user the good news
exit 0