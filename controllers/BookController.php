<?php

class BookController
{
  public function showBook() :void 
  {
    $view = new View("Books");
    $view->render("ourBooks");
  }
}