<?php

class BookManager extends AbstractEntityManager
{
    /**
     * @var PDO PDO instance for database operations
     */
    protected $db;

    public function __construct()
    {
        $this->db = DBManager::getInstance()->getPDO();
    }

     /**
     * @return array Returns an array of all books
     * @throws Exception if there is an error fetching books
     */
    public function getAllBooks(): array
    {
        try {
            $query = "SELECT b.id, b.user_id, b.title, b.author, b.description, b.image, b.is_available, u.username AS owner_username
                FROM book b
                LEFT JOIN user u ON b.user_id = u.id
                 WHERE b.is_available = 1";

            $statement = $this->db->prepare($query);
            $statement->execute();

            $books = [];
            while ($bookData = $statement->fetch(PDO::FETCH_ASSOC)) {
                $book = new Book();
                $book->setId($bookData['id']);
                $book->setIdUser($bookData['user_id']);
                $book->setTitle($bookData['title']);
                $book->setAuthor($bookData['author']);
                $book->setDescription($bookData['description']);
                $book->setImage($bookData['image']);
                $book->setIsAvailable((bool)$bookData['is_available']);
                $book->setUserName($bookData['owner_username']);

                $books[] = $book;
            }

            return $books;
        } catch (PDOException $e) {
            throw new Exception("Error fetching books: " . $e->getMessage());
        }
    }

     /**
     * @param int $id Book ID
     * @return Book|null Returns a Book object or null if not found
     */
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

    /**
     * @param string $title Title to search for
     * @return array Returns an array of books matching the title
     * @throws Exception if there is an error searching books by title
     */
    public function searchBooksByTitle(string $title): array
    {
        try {
            $query = "SELECT b.id, b.user_id, b.title, b.author, b.description, b.image, b.is_available, u.username AS userName
                FROM book b
                LEFT JOIN user u ON b.user_id = u.id
                WHERE b.title LIKE :title";

            $statement = $this->db->prepare($query);
            $statement->execute([':title' => '%' . $title . '%']);

            $books = [];
            while ($bookData = $statement->fetch(PDO::FETCH_ASSOC)) {
                $book = new Book();
                $book->setId($bookData['id']);
                $book->setIdUser($bookData['user_id']);
                $book->setTitle($bookData['title']);
                $book->setAuthor($bookData['author']);
                $book->setDescription($bookData['description']);
                $book->setImage($bookData['image']);
                $book->setIsAvailable((bool)$bookData['is_available']);
                $book->setUserName($bookData['userName']);

                $books[] = $book;
            }

            return $books;
        } catch (PDOException $e) {
            throw new Exception("Error searching books by title: " . $e->getMessage());
        }
    }

    /**
     * @param int $userId User ID
     * @return array Returns an array of books for a specific user
     */
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

     /**
     * @param int $userId User ID
     * @return int Returns the count of books for a specific user
     */
    public function countUserBooks(int $userId): int
    {
        $query = "SELECT COUNT(*) AS total_books FROM book WHERE user_id = :user_id";
        $statement = $this->db->prepare($query);
        $statement->execute([':user_id' => $userId]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['total_books'] ?? 0;
    }

    /**
     * @param Book $book Book object to update
     * @return bool Returns true if the update was successful
     */
    public function updateBook(Book $book): bool
    {
        $query = "UPDATE book SET title = :title, author = :author, description = :description, is_available = :is_available, image = :image WHERE id = :id";
        $statement = $this->db->prepare($query);
        return $statement->execute(
            [
                ':id' => $book->getId(),
                ':title' => $book->getTitle(),
                ':author' => $book->getAuthor(),
                ':description' => $book->getDescription(),
                ':is_available' => $book->isAvailable(),
                ':image' => $book->getImage()
            ]
        );
    }

    /**
     * @return array Returns an array of the latest books
     * @throws Exception if there is an error fetching latest books
     */
    public function getLatestBooks(): array
    {
        try {
            $query = "SELECT b.id, b.user_id, b.title, b.author, b.description, b.image, b.is_available, u.username AS userName
                  FROM book b
                  LEFT JOIN user u ON b.user_id = u.id
                  ORDER BY b.id DESC
                  LIMIT 4";

            $statement = $this->db->prepare($query);
            $statement->execute();

            $books = [];
            while ($bookData = $statement->fetch(PDO::FETCH_ASSOC)) {
                $book = new Book();
                $book->setId($bookData['id']);
                $book->setIdUser($bookData['user_id']);
                $book->setTitle($bookData['title']);
                $book->setAuthor($bookData['author']);
                $book->setImage($bookData['image']);
                $book->setUserName($bookData['userName']);

                $books[] = $book;
            }

            return $books;
        } catch (PDOException $e) {
            throw new Exception("Error fetching latest books: " . $e->getMessage());
        }
    }

     /**
     * @param int $id Book ID to delete
     * @return bool Returns true if the book was deleted successfully
     */
    public function deleteBook(int $id): bool
    {
        $query = "DELETE FROM book WHERE id = :id";
        $statement = $this->db->prepare($query);
        return $statement->execute([':id' => $id]);
    }
}
