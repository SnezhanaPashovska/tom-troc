<?php

class MessageController
{
  private $messageManager;

  public function __construct()
  {
    $this->messageManager = new MessageManager();
  }

  public function showMessages(): void
  {
    try {
      if (!isset($_SESSION['idUser'])) {
        throw new Exception("User not logged in.");
      }

      $user_id_sender = (int)$_SESSION['idUser'];
      $user_id_receiver = isset($_GET['receiver_id']) ? (int)$_GET['receiver_id'] : null;

      $userManager = new UserManager();

      // Fetch latest messages from all receivers for the sidebar
      $latestMessages = $this->messageManager->getLatestMessagesFromAllReceivers($user_id_sender);

      // Fetch all messages between sender and specific receiver for the message area
      if ($user_id_receiver) {
        $receiver = $userManager->getUserById($user_id_receiver);
        if (!$receiver) {
          throw new Exception("User with ID $user_id_receiver not found.");
        }
        $messages = $this->messageManager->getAllMessagesBetweenUsers($user_id_sender, $user_id_receiver);
      } else {
        $receiver = null;
        $messages = [];
      }

      $view = new View("Messages");
      $view->render("messages", [
        'latestMessages' => $latestMessages,
        'messages' => $messages,
        'receiver' => $receiver,
        'user_id_receiver' => $user_id_receiver,
      ]);
    } catch (Exception $e) {
      $view = new View("Error");
      $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
    }
  }

  public function createMessage(): void
  {
    try {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Retrieve data from POST
          $user_id_sender = (int) Utils::request('user_id_sender', -1);
          $user_id_receiver = (int) Utils::request('user_id_receiver', -1);
          $text = Utils::request('text', '');

          // Validate input
          if ($user_id_sender === -1 || $user_id_receiver === -1 || empty($text)) {
              throw new Exception("Invalid input data.");
          }

          // Fetch receiver details
          $userManager = new UserManager();
          $receiver = $userManager->getUserById($user_id_receiver);

          if (!$receiver) {
              throw new Exception("User with ID $user_id_receiver not found.");
          }

          // Call sendMessage method in MessageManager
          $this->messageManager->sendMessage($user_id_sender, $user_id_receiver, $text);

          // Redirect after successful message sending
          header("Location: index.php?action=messages&receiver_id={$user_id_receiver}");
          exit();
      } else {
          throw new Exception("Invalid request method.");
      }
  } catch (Exception $e) {
      $view = new View("Error");
      $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
  }
  }
}
