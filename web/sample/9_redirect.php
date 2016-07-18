<?php
require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

use Symfony\Component\HttpFoundation\Response;

$app->get('/foo', function() {
    return new Response('I am redirected to foo page');
})->bind("foopage"); // this is the route name


/*  can give an explicit route name by calling bind.
$app->get('/', function () {
    // ...
})
->bind('homepage');

$app->get('/blog/{id}', function ($id) {
    // ...
})
->bind('blog_post');
*/



$app->get('/redirect', function() use ($app) {
    return $app->redirect($app["url_generator"]->generate("foopage"));
}); 

$app->run();

?>
