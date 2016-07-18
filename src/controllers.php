<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Silex\Provider\UrlGeneratorServiceProvider;

//$app->mount('/myfirstclass', new MyApp\Sample\MyClassController());

$app['users.controller'] = function ($app) {
    return new MyApp\Users\UserController($app);
};

$app['users.repository'] = function ($app) {
    return new MyApp\Users\UserRepository($app['db']);
};

$app->mount('/', new MyApp\Users\UserControllerProvider());
