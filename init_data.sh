#!/bin/bash

rm -rf Docker/data;
mkdir -pv Docker/data/mongodb;
mkdir -pv Docker/data/mysql;
mkdir -pv Docker/data/elasticsearch;
docker rm $(docker ps -a -q);
chown -R $USER Docker/data;
chmod -R 777 Docker/data;
