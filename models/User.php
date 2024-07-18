<?php

class User extends AbstractEntity
{
  protected int $id = -1;
  private string $username;
  private string $email;
  private string $password;
  private ?string $image = null;
  private bool $isAdmin = false;
  private ?string $creationDate = null;


  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function setUsername(string $username): void
  {
    $this->username = $username;
  }

  public function getUsername(): string
  {
    return $this->username;
  }

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  public function setCreationDate(string|DateTime $creationDate, string $format = 'Y-m-d H:i:s'): void
  {
    if ($creationDate instanceof DateTime) {
      $this->creationDate = $creationDate->format($format);
    } elseif (is_string($creationDate)) {
      if (!$this->creationDate) {
        $this->creationDate = $creationDate;
      }
    } else {
      $this->creationDate = null;
    }
  }

  public function getCreationDate(): ?string
  {
    return $this->creationDate;
  }

  public function setImage(?string $image): void
  {
    $this->image = $image;
  }

  public function getImage(): ?string
  {
    return $this->image;
  }

  public function setIsAdmin(bool $isAdmin): void
  {
    $this->isAdmin = $isAdmin;
  }

  public function isAdmin(): bool
  {
    return $this->isAdmin;
  }

  public function getMembershipDuration(): string
  {
    if ($this->creationDate === null) {
      return "Date de création non disponible";
    }

    $creationDate = new DateTime($this->creationDate);
    $currentDate = new DateTime();
    $interval = $currentDate->diff($creationDate);

    if ($interval->y > 0) {
      $duration = $interval->y . " an" . ($interval->y > 1 ? "s" : "");
    } elseif ($interval->m > 0) {
      $duration = $interval->m . " mois";
    } else {
      $duration = $interval->d . " jour" . ($interval->d > 1 ? "s" : "");
    }

    return $duration;
  }
}
