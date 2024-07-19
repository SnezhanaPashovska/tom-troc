<?php

class MessageManager
{
    /**
     * @var PDO $db Database connection instance
     */
    protected $db;

    public function __construct()
    {
        $this->db = DBManager::getInstance()->getPDO();
    }

    /**
     * Sends a message from one user to another.
     * @param int $user_id_sender Sender's user ID
     * @param int $user_id_receiver Receiver's user ID
     * @param string $text The message text
     */
    public function sendMessage(int $user_id_sender, int $user_id_receiver, string $text): void
    {
        $statement = $this->db->prepare('INSERT INTO message (user_id_sender, user_id_receiver, text, created_at) VALUES (?, ?, ?, ?)');
        $statement->execute([$user_id_sender, $user_id_receiver, $text, date('Y-m-d H:i:s')]);
    }

    /**
     * Retrieves all messages from the database.
     * @return Message[] Array of Message objects
     */
    public function getAllmessages(): array
    {
        $query = "SELECT * FROM message";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $messagesData = $statement->fetchAll(PDO::FETCH_ASSOC);

        $messages = [];
        foreach ($messagesData as $messageData) {
            $message = new Message();
            $message->setId($messageData['id']);
            $message->setUserIdSender($messageData['user_id_sender']);
            $message->setUserIdReceiver($messageData['user_id_receiver']);
            $message->setText($messageData['text']);
            $message->setCreatedAt($messageData['created_at']);
            $messages[] = $message;
        }

        return $messages;
    }

    /**
     * Retrieves the latest message from each receiver for a given sender.
     * @param int $user_id_sender Sender's user ID
     * @return array Array of associative arrays containing message data and receiver details
     */
    public function getLatestMessagesFromAllReceivers(int $user_id_sender): array
    {
        $query = "
      SELECT m.*, u.username as receiver_username, u.image as receiver_image
      FROM message m
      INNER JOIN user u ON m.user_id_receiver = u.id
      INNER JOIN (
        SELECT user_id_receiver, MAX(created_at) as latest_message_time
        FROM message
        WHERE user_id_sender = :user_id_sender
        GROUP BY user_id_receiver
      ) lm ON m.user_id_receiver = lm.user_id_receiver AND m.created_at = lm.latest_message_time
      ORDER BY m.created_at DESC
    ";
        $statement = $this->db->prepare($query);
        $statement->execute([':user_id_sender' => $user_id_sender]);
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($messages as &$message) {
            $message['created_at'] = new DateTime($message['created_at']);
        }

        return $messages;
    }

    /**
     * Retrieves all messages exchanged between two users.
     * @param int $user_id_sender Sender's user ID
     * @param int $user_id_receiver Receiver's user ID
     * @return array Array of associative arrays containing message data
     */
    public function getAllMessagesBetweenUsers(int $user_id_sender, int $user_id_receiver): array
    {
        $query = "
      SELECT *
      FROM message
      WHERE (user_id_sender = :user_id_sender AND user_id_receiver = :user_id_receiver)
         OR (user_id_sender = :user_id_receiver AND user_id_receiver = :user_id_sender)
      ORDER BY created_at ASC
    ";
        $statement = $this->db->prepare($query);
        $statement->execute(
            [
            ':user_id_sender' => $user_id_sender,
            ':user_id_receiver' => $user_id_receiver
            ]
        );
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($messages as &$message) {
            $message['created_at'] = new DateTime($message['created_at']);
        }

        return $messages;
    }
}
