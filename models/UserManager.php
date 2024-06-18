<?php

class UserManager extends AbstractEntityManager
{

  protected $db;

  public function __construct()
  {
      $this->db = DBManager::getInstance()->getPDO();
  }


  public function getUserByEmail(string $email): ?User
  {
      // SQL query to select user by email
      $query = "SELECT * FROM user WHERE email = :email";
      
      // Prepare the statement
      $statement = $this->db->prepare($query);
      
      // Bind parameter
      $statement->bindParam(':email', $email);
      
      // Execute the query
      $statement->execute();
      
      // Fetch user data as associative array
      $userData = $statement->fetch(PDO::FETCH_ASSOC);
      
      // If user data is fetched, create a User object
      if ($userData) {
          $user = new User();
          $user->setId($userData['id']);
          $user->setUsername($userData['username']);
          $user->setEmail($userData['email']);
          $user->setPassword($userData['password']);
          // Set other properties as needed
          
          return $user;
      }
      
      // Return null if no user found
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

    public function getUserById(int $id = null) : ?User
{
    if ($id === null) {
        return null; // Return null if id is not provided
    }

    $query = "SELECT * FROM user WHERE id = :id";
    $statement = $this->db->prepare($query);
    $statement->execute([':id' => $id]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    //var_dump($user); // Debugging line to check the fetched user data

    if ($user) {
        return new User($user);
    }
    return null;
}
      

    /*return [
        'id' => $userData->getUsername(),
        'username' => $userData->getUsername(),
        'email' => $userData['email'],
        'password' => $userData['password'],
        'image' => $userData['image'],
        'is_Admin' => (bool) $userData['is_Admin'],
        'creation_date' => $userData['creation_date']
    ];*/
      

}