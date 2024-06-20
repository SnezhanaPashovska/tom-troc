<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

      case 'myAccount':
      $userController = new UserController();
      $userController->showUser();
        break;

    case 'connectUser':
      $userController = new UserController();
      $userController->connectUser();
      break;

    case 'connectionForm': 
      $userController = new UserController();
      $userController->displayConnectionForm();
      break;
    case 'subscriptionForm': 
      $userController = new UserController();
      $userController->subscribeUser();
      break;
    case 'subscribeUser':
      $userController = new UserController();
      $userController->subscribeUser();
      break;

      case 'disconnect':
      $userController = new UserController();
      $userController->disconnectUser();
      break;

      case 'ourBooks' : 
      $bookController = new BookController();
      $bookController->showBook();
      break;

      case 'bookDetail' : 
      $bookController = new BookController();
      $bookController->showBook();
      break;

    default: 
    throw new Exception("Unknown action: $action");
  }
 
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}

