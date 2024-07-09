<?php

class BookManager extends AbstractEntityManager
{

  protected $db;

  public function __construct()
  {
    $this->db = DBManager::getInstance()->getPDO();
  }


  public function getAllBooks(): array
  {
    try {
      $query = "SELECT b.*, u.username AS owner_username
                      FROM book b
                      LEFT JOIN user u ON b.user_id = u.id";

      $statement = $this->db->prepare($query);
      $statement->execute();

      $books = [];
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $book = new Book();
        $book->setId($row['id']);
        $book->setIdUser($row['user_id']);
        $book->setTitle($row['title']);
        $book->setAuthor($row['author']);
        $book->setDescription($row['description']);
        $book->setImage($row['image']);
        $book->setIsAvailable((bool)$row['is_available']);
        $book->setUserName($row['owner_username']); // Assuming this is the username of the owner

        $books[] = $book;
      }

      return $books;
    } catch (PDOException $e) {
      throw new Exception("Error fetching books: " . $e->getMessage());
    }
  }

  public function getBookById(int $id): ?Book
  {

    $query = "SELECT * FROM book WHERE id = :id";
    $statement = $this->db->prepare($query);
    $statement->execute([':id' => $id]);

    $bookData = $statement->fetch(PDO::FETCH_ASSOC);

    if ($bookData) {
      $book = new Book();
      $book->setId($bookData['id']);
      $book->setIdUser($bookData['user_id']);
      $book->setTitle($bookData['title']);
      $book->setAuthor($bookData['author']);
      $book->setDescription($bookData['description']);
      $book->setImage($bookData['image']);
      $book->setIsAvailable((bool)$bookData['is_available']);

      return $book;
    }

    return null;
  }

  public function searchBooksByTitle(string $title): array
  {
    $query = "SELECT b.*, u.username AS userName
              FROM book b
              LEFT JOIN user u ON b.user_id = u.id
              WHERE b.title LIKE :title";
    $statement = $this->db->prepare($query);
    $statement->execute([':title' => '%' . $title . '%']);

    $books = [];
    while ($book = $statement->fetch(PDO::FETCH_ASSOC)) {
      $books[] = new Book($book);
    }
    return $books;
  }

  public function getUserBooks(int $userId): array
  {
    $query = "SELECT id, title, author, description, image, is_available FROM book WHERE user_id = :user_id";
    $statement = $this->db->prepare($query);
    $statement->execute([':user_id' => $userId]);

    $books = [];
    while ($bookData = $statement->fetch(PDO::FETCH_ASSOC)) {
      $book = new Book();
      $book->setId($bookData['id']);
      $book->setTitle($bookData['title']);
      $book->setAuthor($bookData['author']);
      $book->setDescription($bookData['description']);
      $book->setImage($bookData['image']);
      $book->setIsAvailable((bool)$bookData['is_available']);

      $books[] = $book;
    }
    return $books;
  }

  public function countUserBooks(int $userId): int
  {
    $query = "SELECT COUNT(*) AS total_books FROM book WHERE user_id = :user_id";
    $statement = $this->db->prepare($query);
    $statement->execute([':user_id' => $userId]);

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['total_books'] ?? 0;
  }

  public function updateBook(Book $book): bool
  {
    $query = "UPDATE book SET title = :title, author = :author, description = :description, is_available = :is_available, image = :image WHERE id = :id";
    $statement = $this->db->prepare($query);
    return $statement->execute([
      ':id' => $book->getId(),
      ':title' => $book->getTitle(),
      ':author' => $book->getAuthor(),
      ':description' => $book->getDescription(),
      ':is_available' => $book->isAvailable(),
      ':image' => $book->getImage()
    ]);
  }

  public function deleteBook(int $id): bool
  {
    $query = "DELETE FROM book WHERE id = :id";
    $statement = $this->db->prepare($query);
    return $statement->execute([':id' => $id]);
  }
}
