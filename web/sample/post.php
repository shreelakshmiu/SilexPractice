<?php


require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->post('/feedback', function (Request $request) {
    $message = $request->get('message');
    return new Response('Here is your feedabck <br> <b> '.$message.' </b> <br/> Thank you for your feedback!', 201);
});

$app->run();

?>
