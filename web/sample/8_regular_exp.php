<?php

require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// using regular expressions by calling assert on the Controller object, which is returned by the routing methods.

$app->get('/{id}/{commentid}', function ($id,$commentid) {
	return "id-->".$id.' <br /> commentid -->'.$commentid;
})
->assert('id', '\d+')
->assert('commentid', '\d+');

$app->run();
    
?>
