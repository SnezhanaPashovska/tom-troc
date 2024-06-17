<?php

class User extends AbstractEntity
{
  private string $username;
  private string $email;
  private string $password;
  private ?string $image = null;
  private bool $isAdmin = false; 
  private ?string $creationDate = null;

  public function setUsername(string $username) : void 
  {
    $this->username = $username;
  }

  public function getUsername() : string 
  {
    return $this->username;
  }

  public function setEmail(string $email) : void 
  {
    $this->email = $email;
  }

  public function getEmail() : string 
  {
    return $this->email;
  }

  public function setPassword(string $password) : void 
  {
    $this->password = $password;
  }

  public function getPassword() : string 
  {
    return $this->password;
  }

  public function setCreationDate(string|DateTime $creationDate, string $format = 'Y-m-d H:i:s') : void 
  {
    if ($creationDate instanceof DateTime) {
        $this->creationDate = $creationDate->format($format);
    } elseif (is_string($creationDate)) {
        $this->creationDate = $creationDate;
    } else {
        $this->creationDate = null;
    }
}

  public function getCreationDate() : DateTime 
    {
      return $this->creationDate;
    }

  public function setImage(?string $image) : void 
  {
    $this->image = $image;
  }

  public function getImage() : ?string 
  {
    return $this->image;
  }

  public function setIsAdmin(bool $isAdmin) : void 
  {
    $this->isAdmin = $isAdmin;
  }

  public function isAdmin() : bool 
  {
    return $this->isAdmin;
  }

}