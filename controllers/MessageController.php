<?php

class MessageController 
{
  function showMessages() 
  {
    $view = new View ("Messages");
    $view->render("messages");
  }
}