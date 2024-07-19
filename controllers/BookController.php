<?php

/**
 * Class BookController
 *
 * Controller for handling book-related actions.
 */

class BookController
{
    /**
     * Displays a list of all books.
     *
     * @return void
     * @throws Exception If no books are found or if an error occurs.
     */
    public function showBooks(): void
    {
        try {
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

    /**
     * Displays the details of a specific book.
     *
     * @return void
     * @throws Exception If the book or user is not found.
     */
    public function showBookDetail(): void
    {
        try {
            $bookId = Utils::request("id", -1);

            $bookManager = new BookManager();
            $book = $bookManager->getBookById($bookId);

            if (!$book) {
                throw new Exception("Le livre demandé n'existe pas.");
            }

            $userManager = new UserManager();
            $user = $userManager->getUserById($book->getIdUser());

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

    /**
     * Searches for books based on a query.
     *
     * @return void
     * @throws Exception If no books are found matching the query.
     */
    public function searchBooks(): void
    {
        try {
            $searchQuery = Utils::request("search_query", "");


            $bookManager = new BookManager();
            $books = $bookManager->searchBooksByTitle($searchQuery);

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

    /**
     * Handles the editing of a book's details.
     *
     * @return void
     * @throws Exception If the book does not exist or an error occurs during the update.
     */
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

    /**
     * Deletes a book based on its ID.
     *
     * @return void
     * @throws Exception If the book does not exist or an error occurs during deletion.
     */
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
