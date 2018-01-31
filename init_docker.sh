#!/bin/bash

rm -rf Webroot/storage;
mkdir -pv Webroot/storage/{task,pid,log};
# docker rm $(docker ps -a -q)
chown -R $USER Webroot/storage
chmod -R 777 Webroot/storage

mkdir -pv Webroot/htdocs/{assets,uploadfiles};
chown -R $USER Webroot/htdocs
chmod -R 777 Webroot/htdocs
