<?php

use Silex\Application;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\RoutingServiceProvider;

ErrorHandler::register();
ExceptionHandler::register();  

$app = new Silex\Application();

$app->register(new Silex\Provider\RoutingServiceProvider());

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbhost' => 'localhost',
        'dbname' => 'silex_testing',
        'user' => 'root',
        'password' => 'Impelsys1',
    ),
)); 

return $app;

?>
