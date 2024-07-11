<?php

class UserController
{

    private function checkIfUserIsConnected(): void
    {
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
            exit;
        }
    }

    public function showUser(): void
    {
        $this->checkIfUserIsConnected();

        $userManager = new UserManager();
        $user = $userManager->getUserById($_SESSION['idUser']);

        if (!$user) {
            throw new Exception("User not found.");
        }

        $bookManager = new BookManager();
        $userBooks = $bookManager->getUserBooks($user->getId());
        $totalBooks = $bookManager->countUserBooks($user->getId());

        $view = new View("Profile");
        $view->render("myAccount", ['user' => $user, 'userBooks' => $userBooks, 'totalBooks' => $totalBooks]);
    }

    public function displayConnectionForm(): void
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }

    public function connectUser(): void
    {
        $email = htmlspecialchars(Utils::request("email"));
        $password = htmlspecialchars(Utils::request("password"));

        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        if (!$user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        if (!password_verify($password, $user->getPassword())) {
            throw new Exception("Le mot de passe est incorrect ");
        }

        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();

        Utils::redirect("myAccount");
    }

    public function subscribeUser(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = htmlspecialchars(Utils::request("username") ?? '');
            $email = htmlspecialchars(Utils::request("email") ?? '');
            $password = htmlspecialchars(Utils::request("password") ?? '');

            if (empty($username) || empty($email) || empty($password)) {
                throw new Exception("Tous les champs sont obligatoires.");
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $newUser = new User([
                'username' => $username,
                'email' => $email,
                'password' => $hashedPassword,
                'isAdmin' => false
            ]);

            $userManager = new UserManager(DBManager::getInstance());
            $addedUser = $userManager->addUser($newUser);

            if ($addedUser) {

                Utils::redirect("connectionForm");
            } else {

                throw new Exception("L'inscription a échoué.");
            }
        } else {

            $view = new View("Subscription");
            $view->render("subscriptionForm");
        }
    }

    public function disconnectUser(): void
    {
        unset($_SESSION['user']);
        session_destroy();

        Utils::redirect("home");
    }

    public function updateUser(): void
    {
        $this->checkIfUserIsConnected();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userManager = new UserManager();
            $user = $userManager->getUserById($_SESSION['idUser']);

            if (!$user) {
                throw new Exception("User not found.");
            }

            $originalCreationDate = $user->getCreationDate();

            if (isset($_FILES['new_photo'])) {
                if ($_FILES['new_photo']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = realpath(__DIR__ . '/../images/uploads/');
                    $uploadFile = $uploadDir . '/' . basename($_FILES['new_photo']['name']);

                    if (move_uploaded_file($_FILES['new_photo']['tmp_name'], $uploadFile)) {
                        $user->setImage('images/uploads/' . basename($_FILES['new_photo']['name']));
                    } else {
                        throw new Exception("Error moving uploaded file.");
                    }
                } elseif ($_FILES['new_photo']['error'] !== UPLOAD_ERR_NO_FILE) {
                    throw new Exception("File upload error: " . $_FILES['new_photo']['error']);
                }
            }

            // Handle username, email, and password
            $username = isset($_POST['username']) ? trim($_POST['username']) : $user->getUsername();
            $email = isset($_POST['email']) ? trim($_POST['email']) : $user->getEmail();
            $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user->getPassword();

            // Update user data in the object
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);

            // Set back the original creation date
            $user->setCreationDate($originalCreationDate);

            // Update user in the database via UserManager
            $userManager->updateUser($user);

            // Redirect to myAccount page after successful update
            header('Location: index.php?action=myAccount');
            exit;
        }
    }
}
