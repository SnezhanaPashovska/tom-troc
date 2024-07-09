<?php

class BookController
{
    public function showBooks(): void
    {
        try {
            $id = Utils::request("id", -1);

            $bookManager = new BookManager();
            $book = $bookManager->getAllBooks();

            if (!$book) {
                throw new Exception("Le livre demandé n'existe pas.");
            }
            $view = new View("Books");
            $view->render("ourBooks", ['books' => $book]);
        } catch (Exception $e) {

            $view = new View("Error");
            $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
        }
    }

    public function showBookDetail(): void
    {
        try {
            $bookId = Utils::request("id", -1);

            $bookManager = new BookManager();
            $book = $bookManager->getBookById($bookId);

            //var_dump($bookId); // Check $bookId
            //var_dump($book->getIdUser()); // Check $book->getIdUser()

            if (!$book) {
                throw new Exception("Le livre demandé n'existe pas.");
            }

            $userManager = new UserManager();
            $user = $userManager->getUserById($book->getIdUser()); // Fetch user using userId

            //var_dump($user);

            if (!$user) {
                throw new Exception("Utilisateur non trouvé.");
            }

            $view = new View("bookDetail");
            $view->render("bookDetail", ['book' => $book, 'user' => $user]);
        } catch (Exception $e) {
            $view = new View("Error");
            $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
        }
    }


    public function searchBooks(): void
    {
        try {
            $searchQuery = Utils::request("search_query", "");
            // var_dump($_POST); // Debugging line
            //var_dump($searchQuery); // Debugging line

            $bookManager = new BookManager();
            $books = $bookManager->searchBooksByTitle($searchQuery);

            //var_dump($books); // Debugging line

            if (empty($books)) {
                throw new Exception("No books found matching your search query.");
            }

            $view = new View("Books");
            $view->render("ourBooks", ['books' => $books]);
        } catch (Exception $e) {
            $view = new View("Error");
            $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
        }
    }

    public function editBook(): void
    {

        $bookManager = new BookManager();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $book = new Book();
            $book->setId(Utils::request('id', -1));
            $book->setTitle(Utils::request('title', ''));
            $book->setAuthor(Utils::request('author', ''));
            $book->setDescription(Utils::request('description', ''));
            $book->setIsAvailable(Utils::request('availability', 0));

            if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['new_photo']['tmp_name'];
                $name = basename($_FILES['new_photo']['name']);
                $target_dir = "images/book_uploads/$name";
                if (move_uploaded_file($tmp_name, $target_dir)) {
                    $book->setImage($target_dir);
                } else {
                    echo "Failed to move uploaded file.";
                }
            } else {
                $existingBook = $bookManager->getBookById($book->getId());
                $book->setImage($existingBook->getImage());
            }

            $updated = $bookManager->updateBook($book);

            if ($updated) {
                header('Location: index.php?action=myAccount&status=success');
                exit();
            } else {
                header('Location: index.php?action=myAccount&status=failure');
                exit();
            }
        } else {
            $bookId = Utils::request("id", -1);
            $book = $bookManager->getBookById($bookId);

            if (!$book) {
                throw new Exception("Le livre demandé n'existe pas.");
            }

            $view = new View("editBook");
            $view->render("editBook", ['book' => $book]);
        }
    }

    public function deleteBook(): void
    {
        $bookId = Utils::request("id", -1);
        if ($bookId != -1) {
            $bookManager = new BookManager();
            $deleted = $bookManager->deleteBook($bookId);

            if ($deleted) {
                header('Location: index.php?action=myAccount&status=delete_success');
                exit();
            } else {
                header('Location: index.php?action=myAccount&status=delete_failure');
                exit();
            }
        } else {
            throw new Exception("Le livre demandé n'existe pas.");
        }
    }
}
