<?php


require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// Sample - 1 

/*
$app->get('/{id}', function ($id) {
	return "User - {$id}";
})->convert('id', function ($id) { return (int) $id; });

$app->run(); 

*/
// Sample - 2  //convert route variables to objects as it allows to reuse the conversion code across different controllers:


class UserConverter
{
    public function convert($id)
    {
	return (int) $id;
    }
}

$app['testconverter.instuser'] = function () {
    return new UserConverter();
}; 


$app->get('/{user}', function ($user) {
    return 'Converted--->'. $user ;                                             
})->convert('user', 'testconverter.instuser:convert');

//$app->run(Symfony\Component\HttpFoundation\Request::create("/dave"));
$app->run();


?>

