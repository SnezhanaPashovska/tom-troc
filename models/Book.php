<?php

class Book extends AbstractEntity 
{

  protected int $id = -1;
  private int $idUser = -1;
  private string $title = "";
  private string $author = "";
  private string $description = "";
  private ?string $image = null;
  private bool $isAvailable = false; 
  private string $userName ="";

  public function setId(int $id): void 
    {
      $this->id = $id;
    }

  public function getId(): int 
    {
     return $this->id;
    }

  public function setIdUser(int $idUser) : void 
    {
        $this->idUser = $idUser;
    }

    public function getIdUser() : int 
    {
        return $this->idUser;
    }

    public function setTitle(string $title) : void 
    {
        $this->title = $title;
    }

    public function getTitle() : string 
    {
        return $this->title;
    }

   //author
   public function setAuthor(string $author) : void 
    {
        $this->author = $author;
    }

    public function getAuthor() : string 
    {
        return $this->author;
    }
   

    public function setDescription(string $description) : void 
    {
        $this->description = $description;
    }

    public function getDescription(int $length = -1) : string 
    {
        if ($length > 0) {
            // Ici, on utilise mb_substr et pas substr pour éviter de couper un caractère en deux (caractère multibyte comme les accents).
            $description = mb_substr($this->description, 0, $length);
            if (strlen($this->description) > $length) {
              $description .= "...";
            }
            return $description;
        }
        return $this->description;
    }

     public function setImage(?string $image) : void 
    {
      $this->image = $image;
    }

    public function getImage() : ?string 
    {
      return $this->image;
    }

    public function setIsAvailable(bool $isAvailable) : void 
    {
      $this->isAvailable = $isAvailable;
    }

    public function isAvailable() : bool 
    {
      return $this->isAvailable;;
    }

    public function setUserName(string $userName) : void 
    {
        $this->userName = $userName;
    }

    public function getUserName(): string {
      return $this->userName;
  }
  
}