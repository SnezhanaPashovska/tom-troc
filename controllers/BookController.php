<?php

class BookController
{
  public function showBooks() :void 
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

            var_dump($bookId); // Check $bookId
        var_dump($book->getIdUser()); // Check $book->getIdUser()

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


public function searchBooks() : void 
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


}

