<?php
require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

use Symfony\Component\HttpFoundation\Response;

$app->get('/{blog}', function() {
    return new Response('I am redirected to blog page');
})->bind("blogpage"); // this is the route name


/*
$app->get('/blog/{id}', function ($id) {
    // ...
})
->bind('blog_post');
*/


$app->run();

?>
