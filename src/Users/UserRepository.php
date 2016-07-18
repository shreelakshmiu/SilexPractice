<?php

namespace MyApp\Users;

use MyApp\ObjectNotFoundException;
use MyApp\RepositoryInterface;
use Doctrine\DBAL\Connection;

class UserRepository implements RepositoryInterface
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $conn;

    public function __construct(Connection $conn)
    {
      $this->conn = $conn;
    }

    public function find($id)
    {
        $record = $this->conn->fetchAssoc("SELECT * FROM users WHERE id = :id", [':id' => $id]);
        if (!$record) {
            throw new ObjectNotFoundException("User not found for ID: {$id}");
        }

      return $record;
    }

    public function findByUsername($username)
    {
        $record = $this->conn->fetchAssoc("SELECT  * FROM users WHERE username = :username", [':username' => $username]);
        if (!$record) {
          throw new ObjectNotFoundException("User not found for name: {$username}");
        }

        return $record;
    }

    public function update($user,$updateUser)
    {
        $this->conn->update('users', ['firstname' => $updateUser['firstname'], 'lastname' => $updateUser['lastname']], ['id' => $user['id']]);
    }

    public function create($user)
    {
        try {
            $rows = $this->conn->insert('users', [
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'username' => $user['username'],
                'password' => md5($user['password']),
                'address ' => $user['address']
            ]);

            if ($rows) {
              return $this->find($this->conn->lastInsertId());
            } else {
              throw new \InvalidArgumentException("Could not create user: {$user['username']}");
            }
        } catch (\PDOException $e) {
            throw new \InvalidArgumentException($e->getMessage());
        }
    }
    
    public function deleteUser($username)
    {
        try {
            $this->conn->delete('users',['username' => $username ]);
        }  catch (\PDOException $e) {
            throw new \InvalidArgumentException($e->getMessage());
        } 

        
    }
    
    
    
    
}
