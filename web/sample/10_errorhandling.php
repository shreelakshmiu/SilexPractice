<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

ErrorHandler::register();
//ExceptionHandler::register();

$app = new Silex\Application();

$app['debug'] = true;

// E_NOTICE

 //$app->get('/', function () use ($app) { $a + 1; });

// fatal error
$app->get('/', function () use ($app) { asd(); });

/*$app->error(
    function ($e) use ($app) {
        // notices go here with $e of type
        var_dump('silex error handler', get_class($e));
    }
); */

set_exception_handler(function($e) {
    // fatals come here instead of $app->error callback :(
    var_dump('exception handler', get_class($e));
});

$app->run();

?>

