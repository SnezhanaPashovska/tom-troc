<?php

class UserManager extends AbstractEntityManager
{

  public function addUser(User $user) : ?User 
  {
    $statement = "INSERT INTO user (id, username, email, password, image, is_Admin, creation_date) VALUES (:id, :username, :email, :password, :image, :is_Admin, NOW())";
    $this->db->query($statement, [
      'id' => $user->getIdUser(),
      'username' => $user->getUsername(),
      'email' => $user->getEmail(),
      'password' => $user->getPassword(),
      'image' => $user->getImage(),
      'creation_date' => $user->getCreationDateString()

    ]);
  }

  public function getUserByEmail(string $email) : ?User 
  {
    $statement = "SELECT * FROM user WHERE email = :email";
    $result = $this->db->query($statement, ['email' =>$email]);
    $user = $result->fetch();
    if($user) {
      return new User($user);
    }
    return null;
  }

}