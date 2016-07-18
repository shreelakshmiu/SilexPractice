<?php

ini_set('display_errors', 0);
date_default_timezone_set("Asia/Bangkok");
require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/dev.php';
require __DIR__.'/../src/controllers.php';

$app->run();

?>


