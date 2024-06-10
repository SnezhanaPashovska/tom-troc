<?php

class UserManager extends AbstractEntityManager
{
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