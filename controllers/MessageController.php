<?php

/**
 * Class MessageController
 *
 * Handles actions related to messages, including displaying and creating messages.
 */
class MessageController
{
    /**
     * @var MessageManager Manages message-related operations.
     */
    private $messageManager;

    /**
     * MessageController constructor.
     *
     * Initializes the MessageManager instance.
     */
    public function __construct()
    {
        $this->messageManager = new MessageManager();
    }

    /**
     * Displays messages, either a list of the latest messages or messages between users.
     *
     * @return void
     * @throws Exception If the user is not logged in, the receiver is not found, or an error occurs.
     */
    public function showMessages(): void
    {
        try {
            // Ensure the user is logged in
            if (!isset($_SESSION['idUser'])) {
                throw new Exception("User not logged in.");
            }
        
            $user_id_sender = (int)$_SESSION['idUser'];
            $user_id_receiver = isset($_GET['receiver_id']) ? (int)$_GET['receiver_id'] : null;
        
            // Create instances of MessageManager and UserManager
            $messageManager = new MessageManager();
            $userManager = new UserManager();
        
            // Get the latest messages from all receivers
            $latestMessages = $this->messageManager->getLatestMessagesFromAllUsers($user_id_sender);
            
            
            $receiver = null;
            $messages = [];
        
            // If a specific receiver ID is provided, fetch the messages with that user
            if ($user_id_receiver) {
                $receiver = $userManager->getUserById($user_id_receiver);
                if (!$receiver) {
                    throw new Exception("User with ID $user_id_receiver not found.");
                }
                $messages = $this->messageManager->getAllMessagesBetweenUsers($user_id_sender, $user_id_receiver);
            }
            
        
            // Render the view
            $view = new View("Messages");
            $view->render(
                "messages",
                [
                    'latestMessages' => $latestMessages,
                    'messages' => $messages,
                    'receiver' => $receiver,
                    'user_id_receiver' => $user_id_receiver,
                    'user_id_sender' => $user_id_sender,
                ]
            );
        } catch (Exception $e) {
            $view = new View("Error");
            $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
        }}
    

    /**
     * Handles the creation of a new message.
     *
     * @return void
     * @throws Exception If the request method is not POST, or if any input data is invalid.
     */
    public function createMessage(): void
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $user_id_sender = (int) Utils::request('user_id_sender', -1);
                $user_id_receiver = (int) Utils::request('user_id_receiver', -1);
                $text = Utils::request('text', '');

                if ($user_id_sender === -1 || $user_id_receiver === -1 || empty($text)) {
                    throw new Exception("Invalid input data.");
                }

                $userManager = new UserManager();
                $receiver = $userManager->getUserById($user_id_receiver);

                if (!$receiver) {
                    throw new Exception("User with ID $user_id_receiver not found.");
                }

                $this->messageManager->sendMessage($user_id_sender, $user_id_receiver, $text);

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

    /**
     * Counts new messages for the logged-in user.
     *
     * @return void
     */
    
}
