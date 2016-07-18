<?php

namespace MyApp\Users;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController {

    /*protected $app;

    public function __construct(Application $app) {
        parent::__construct($app);
        $app = $app;
    } */

    public function createUser(Application $app, Request $request) {

        $newUser = json_decode($request->getContent(), true);
        $user = $app['users.repository']->create($newUser);
        return $app->redirect('users.view', Response::HTTP_CREATED);
    }

    public function getUser(Application $app, $user) {
        try {
            if ($user) {
                return "Firstname : {$user['firstname']}" . "<br/> Lastname : {$user['lastname']}";
            } else {
                throw new \InvalidArgumentException("Could not find user: {$user['username']}");
            }
        } catch (\PDOException $e) {
            throw new \InvalidArgumentException($e->getMessage());
        }
    }

    public function putUser(Application $app, $user, Request $request) {
        
        $updateUser = json_decode($request->getContent(), true);
        $app['users.repository']->update($user,$updateUser);
        
        $updated_user = $app['users.repository']->findByUsername($user['username']);
        // Let's return the updated object.
        return $this->getUser($app,$updated_user);
    }
    
    public function DeleteUser(Application $app, $user) {
        return "Deleted the User";
    }

}
