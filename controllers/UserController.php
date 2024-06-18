<?php 

class UserController {
    
    private function checkIfUserIsConnected() : void
    {
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
            exit;
        }
    }

    public function showUser(): void {
        $this->checkIfUserIsConnected();

        $userManager = new UserManager();
        $user = $userManager->getUserById($_SESSION['idUser']);

        if ($user) {
            $view = new View("Profile");
            $view->render("profilePublic", ['user' => $user]);
        } else {
            echo "<p>User data not available.</p>"; 
        }
    }
    
    public function displayConnectionForm() : void 
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }

    public function connectUser() : void 
    {
        $email = htmlspecialchars(Utils::request("email"));
        $password = htmlspecialchars(Utils::request("password"));

        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        if (!$user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        if (!password_verify($password, $user->getPassword())) {
            throw new Exception("Le mot de passe est incorrect : $hash");
        }

        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();
    
        Utils::redirect("profilePublic");    
    }

    public function subscribeUser() : void
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

    public function disconnectUser() : void {
        unset($_SESSION['user']); 
        session_destroy(); 
          
        Utils::redirect("home");
    }

}