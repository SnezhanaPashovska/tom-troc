<?php

class UserManager extends AbstractEntityManager
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
     * Retrieves a user by email.
     * @param string $email User's email address
     * @return User|null The User object if found, otherwise null
     */
    public function getUserByEmail(string $email): ?User
    {
        $query = "SELECT * FROM user WHERE email = :email";

        $statement = $this->db->prepare($query);

        $statement->bindParam(':email', $email);

        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            $user = new User();
            $user->setId($userData['id']);
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);

            return $user;
        }

        return null;
    }

    /**
     * Adds a new user to the database.
     * @param User $user The User object to add
     * @return User|null The newly created User object if successful, otherwise null
     */
    public function addUser(User $user): ?User
    {
        try {
            $statement = "INSERT INTO user (username, email, password, is_Admin, creation_date) VALUES (:username, :email, :password, :is_Admin, NOW())";
            $isAdmin = $user->isAdmin() ? 1 : 0;

            $params = [
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'is_Admin' => $user->isAdmin(),
            ];

            $stmt = $this->db->prepare($statement);
            $stmt->execute($params);

            return $this->getUserByEmail($user->getEmail());
        } catch (PDOException $e) {
            echo "Error adding user: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Retrieves a user by ID.
     * @param int $id User's ID
     * @return User|null The User object if found, otherwise null
     */
    public function getUserById(int $id): ?User
    {

        $query = "SELECT * FROM user WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            $user = new User();
            $user->setId($userData['id']);
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            $user->setImage($userData['image'] ?? '');
            $user->setCreationDate($userData['creation_date']);

            return $user;
        }

        return null;
    }

    /**
     * Updates an existing user.
     * @param User $user The User object with updated information
     */
    public function updateUser(User $user): void
    {

        $existingUser = $this->getUserById($user->getId());


        $creationDate = $existingUser->getCreationDate();


        $query = "UPDATE user SET username = :username, email = :email, password = :password, image = :image WHERE id = :id";


        $statement = $this->db->prepare($query);
        $statement->execute(
            [
                ':username' => $user->getUsername(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword(),
                ':image' => $user->getImage(),
                ':id' => $user->getId()
            ]
        );


        if ($creationDate && !$user->getCreationDate()) {
            $user->setCreationDate($creationDate);
        }


        header('Location: index.php?action=myAccount');
        exit;
    }
}
