<?php

require_once __DIR__ . '/config/_config.php';
require_once __DIR__ . '/config/autoload.php';

$action = \Utils::request('action', 'home');

try {
  switch ($action) {

    case 'home':
      $profilePageController = new ProfilePageController();
      $profilePageController->showHome();
      break;

    case 'user': 
      $userController = new UserController();
      $userController->showUser();
      break;

      case 'profilePublic':
      $profilePageController = new ProfilePageController();
      $profilePageController->showProfile();
      break;

    default: 
    throw new Exception("Unknown action: $action");
  }
 
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}

