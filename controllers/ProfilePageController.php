<?php

class ProfilePageController
{
  public function showHome(): void
  {

    $view = new View("Home");
    $view->render("home");
  }

  public function showProfile(): void
  {
    $userManager = new UserManager();

    $userId = Utils::request("id"); 
    $user = $userManager->getUserById($userId);

    if (!$user) {
      // Handle case where user is not found
      echo "<p>User not found.</p>";
      return;
    }

    $bookManager = new BookManager();
    $userBooks = $bookManager->getUserBooks($userId);
    $totalBooks = $bookManager->countUserBooks($userId);

    $view = new View("Profile");
    $view->render("profilePublic", ['user' => $user, 'userBooks' => $userBooks, 'totalBooks' => $totalBooks]);
  }
}
