<?php

namespace MyApp\Sample;
 
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
 
class MyClassController implements ControllerProviderInterface {

  public function connect(Application $app) {
  
    $factory=$app['controllers_factory']; // ControllerCollection
  
    $factory->get('/','MyApp\Sample\MyClassController::home');
    $factory->get('foo','MyApp\Sample\MyClassController::foo');
  
    return $factory; 
  
  }
 
  public function home() {
    return 'Hello World!';
  }
 
  public function foo() {
    return 'I am in foo function';
  } 
 
}

?>
