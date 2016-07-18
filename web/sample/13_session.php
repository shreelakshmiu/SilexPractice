<?php

date_default_timezone_set("Asia/Bangkok");
require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Silex\Provider\DoctrineServiceProvider;

ErrorHandler::register();
ExceptionHandler::register();

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\SessionServiceProvider());

$app->get('/user/{username}', function ($username) use ($app) {
	$app['session']->set('username', $username);    
	
	return "Welcome {$app['session']->get('username')}"; 
	
	$app['session']->remove('username');
	
//	return "Removed session {$app['session']->get('username')}";
	
});

$app->run();

?>
