<?php

class BookController
{
  public function showBook() :void 
  {
    try {
    $id = Utils::request("id", -1);

    $bookManager = new BookManager();
    $book = $bookManager->getAllBooks($id);

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


}
