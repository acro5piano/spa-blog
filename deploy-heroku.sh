#!/bin/bash

sudo rm -rf public/dist
bin/yarn run production
git add .
git commit -m 'heroku deploy'
git push origin master
