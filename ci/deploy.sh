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
eb use $EB_ENV_NAME

# Ensure this script is executed in Circle CI
echo $CIRCLE_SHA1

cat <<EOF > .env
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_LOG_LEVEL=debug
APP_URL=http://localhost

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

DB_CONNECTION=sqlite
EOF

npm run production
eb deploy
