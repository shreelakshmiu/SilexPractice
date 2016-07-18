<?php
date_default_timezone_set("Asia/Bangkok");
require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Silex\Provider\DoctrineServiceProvider;

ErrorHandler::register();
ExceptionHandler::register();

$app = new Silex\Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbhost' => 'localhost',
        'dbname' => 'local_live_brainhive',
        'user' => 'root',
        'password' => 'Impelsys1',
    ),
)); 

$app->get('/user/{username}', function ($username) use ($app) {
    $sql = "SELECT * FROM iplat_user_profile WHERE username = '".$username."' ";
    $user = $app['db']->fetchAssoc($sql);
    return "Firstname : {$user['firstname']}". "<br/> Lastname : {$user['lastname']}";
});

$app->run();

?>