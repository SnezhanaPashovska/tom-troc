<?php

class ProfilePageController 
{
  public function showHome() : void 
  {

    $view = new View("Home");
    $view->render("home");
  }

  public function showProfile() :void 
  {
    //echo "Inside showProfile <br>";
    $view = new View("Profile");
    $view->render("profilePublic");
  }
}