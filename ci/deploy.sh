#!/bin/bash
# Usage: bash ci/deploy.sh

set -eux

sudo apt-get install -y python-dev
pip install awsebcli

mkdir /home/ubuntu/.aws
touch /home/ubuntu/.aws/config
chmod 600 /home/ubuntu/.aws/config
echo "[profile eb-cli]" > /home/ubuntu/.aws/config
echo "aws_access_key_id=$AWS_ACCESS_KEY_ID" >> /home/ubuntu/.aws/config
echo "aws_secret_access_key=$AWS_SECRET_ACCESS_KEY" >> /home/ubuntu/.aws/config

# Ensure this script is executed in Circle CI
echo $CIRCLE_SHA1

eb use $EB_APP_NAME
cp .env.production .env

npm run production
eb deploy
