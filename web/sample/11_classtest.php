<?php
date_default_timezone_set("Asia/Bangkok");
require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

ErrorHandler::register();
ExceptionHandler::register();

$app = new Silex\Application();

// Controller
$app->mount('/myfirstclass', new MyApp\MyClassController());

$app->run();

?>
