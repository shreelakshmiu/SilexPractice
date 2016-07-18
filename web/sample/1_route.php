<?php

require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

/*$app->get('/', function () {
    return 'Index Page';
});*/ 

$app->get('/', function () {
    return new Symfony\Component\HttpFoundation\Response("Index Page");
});  


$app->get('/hello', function () {
    return 'Hello Page';
});

$app->run();

?>


