<?php

/*
| テスト用に、データベースを初期化する
|
| @see https://jordaneldredge.com/blog/speed-up-laravel-tests-with-database-transactions/
*/

echo 'Migrationg database...';
passthru("php artisan --env='testing' migrate:refresh --seed --quiet");
echo " done.\n";
require __DIR__ . '/autoload.php';
