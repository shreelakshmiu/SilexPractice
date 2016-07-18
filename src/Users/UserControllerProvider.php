<?php

namespace MyApp\Users;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class UserControllerProvider implements ControllerProviderInterface {

    public function connect(Application $app) {
        /** @var \Silex\ControllerCollection $controllers */
        $controllers = $app['controllers_factory'];

        $controllers->post('/users', 'MyApp\Users\UserController::createUser')
                ->bind('users.create');

        $controllers->get("/users/{user}", 'MyApp\Users\UserController::getUser')
                ->bind('users.view')
                ->convert('user', function ($username) use ($app) {
                    return $app['users.repository']->findByUsername($username);
                });

        $controllers->put("/users/{user}", 'MyApp\Users\UserController::putUser')
                ->bind('users.update')
                ->convert('user', function ($username) use ($app) {
                    return $app['users.repository']->findByUsername($username);
                });

        $controllers->delete("/users/{user}", 'MyApp\Users\UserController::DeleteUser')
                ->bind('users.delete')
                ->convert('user', function ($username) use ($app) {
                    return $app['users.repository']->deleteUser($username);
                });


        return $controllers;
    }

}
