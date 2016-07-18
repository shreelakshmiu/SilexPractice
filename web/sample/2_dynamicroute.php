<?php


require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

/*******************************************************/
/*$app->get("/users/{id}", function($id){
   return "User - {$id}";
})
->value("id", 0) //set a default value
->assert("id", "\d+"); // make sure the id is numeric
*/
/*******************************************************/

$app->get('/user/{id}/{name}', function ($id,$name) {
	return "User - {$id} - {$name}";
})->convert('id', function ($id) { return (int) $id; });


$app->run();


?>

