<?php

class UserManager extends AbstractEntityManager
{

  protected $db;

  public function __construct(DBManager $db) {

    $this->db = $db;
  }


  public function getUserByEmail(string $email) : ?User 
  {
    $statement = "SELECT * FROM user WHERE email = :email";
    $result = $this->db->query($statement, ['email' => $email]);
    $user = $result->fetch();
    
    if ($user) {
        $userObject = new User();
        $userObject->setId($user['id']);
        $userObject->setUsername($user['username']);
        $userObject->setEmail($user['email']);
        $userObject->setPassword($user['password']);
        $userObject->setImage($user['image']);
        $userObject->setIsAdmin((bool)$user['is_Admin']);
        $userObject->setCreationDate($user['creation_date']); // Assuming creation_date is in a format accepted by setCreationDate
        
        return $userObject;
    }
    
    return null;
  }

  public function addUser(User $user) : ?User 
  {
    try {
      $statement = "INSERT INTO user (username, email, password, is_Admin, creation_date) VALUES (:username, :email, :password, :is_Admin, NOW())";
      $isAdmin = $user->isAdmin() ? 1 : 0;

      $params = [
        'username' => $user->getUsername(),
        'email' => $user->getEmail(),
        'password' => $user->getPassword(),
        'is_Admin' => $user->isAdmin(),
      ];
  
        $this->db->query($statement, $params);
        
        return $this->getUserByEmail($user->getEmail());
      } catch (PDOException $e) {
        echo "Error adding user: " . $e->getMessage();
        return null;
      }
    }

    public function getUserById(int $id) : ?User 
    {
      $statement = "SELECT * FROM user WHERE id = :id";
      $result = $this->db->query($statement, ['id' => $id]);
      $user = $result->fetch();
      if ($user) {
        return new User($user);
      }
      return null;
    }

}