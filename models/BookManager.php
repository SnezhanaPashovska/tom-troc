<?php

class BookManager extends AbstractEntityManager
{
  public function getAllBooks() :array 
  {
    $query = "SELECT b.*, u.username AS username 
                FROM book b 
                LEFT JOIN user u ON b.user_id = u.id";
    $statement = $this->db->query($query);
    $books = [];

    while ($book = $statement->fetch(PDO::FETCH_ASSOC)) {
      error_log("Fetched book data: " . print_r($book, true));
      $books[] = new Book($book);
    }
    return $books;
  }

  public function getBookById(int $id) : ?Book
    {

      if ($id === null) {
        return null; 
    }

        $query = "SELECT * FROM book WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        $book = $statement->fetch(PDO::FETCH_ASSOC);
    //var_dump($book); // Debugging line to check the fetched user data

      if ($book) {
      return new User($book);
  }
  return null;
    }
}