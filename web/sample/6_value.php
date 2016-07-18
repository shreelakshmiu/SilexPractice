<?php
date_default_timezone_set("Asia/Bangkok");
require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

ErrorHandler::register();
ExceptionHandler::register();


$app = new Silex\Application();

$app['debug'] = true;

/****************************************************/
// Router http://localhost/silex/web/sample/2_sample.php/page

$app->get('/page/{page}/{limit}', function($page, $limit) use ($app) {
    return 'Page: ' . $page . ', limit: ' . $limit;
})->value('page', 1)->value('limit', 30);

/****************************************************/


$app->run();

?>
