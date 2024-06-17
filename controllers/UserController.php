<?php 

class UserController {

    // Displays the user profile page
    public function showUser() : void
    {
        Utils::checkIfUserIsConnected();


        $userManager = new UserManager(DBManager::getInstance());
        $user = $userManager->getUserById($_SESSION['idUser']);
        
        var_dump($user);
        
       
            // Render the view with user data
            $view = new View("Profile");
            $view->render("profilePublic", ['user' => $user]);
       
    }

    // Displays the connection form
    public function displayConnectionForm() : void 
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }

    // Handles user connection
    public function connectUser() : void 
    {
        $email = htmlspecialchars(Utils::request("email"));
        $password = htmlspecialchars(Utils::request("password"));

        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        $userManager = new UserManager(DBManager::getInstance());
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

    // Handles user subscription
    public function subscribeUser() : void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission
            $username = htmlspecialchars(Utils::request("username") ?? '');
            $email = htmlspecialchars(Utils::request("email") ?? '');
            $password = htmlspecialchars(Utils::request("password") ?? '');

            if (empty($username) || empty($email) || empty($password)) {
                throw new Exception("Tous les champs sont obligatoires.");
            }

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Create a new User object
            $newUser = new User([
                'username' => $username,
                'email' => $email,
                'password' => $hashedPassword,
                'isAdmin' => false  // Default value for isAdmin
            ]);

            // Add the user to the database
            $userManager = new UserManager(DBManager::getInstance());
            $addedUser = $userManager->addUser($newUser);

            if ($addedUser) {
                // Successfully added user, redirect to profile or login page
                Utils::redirect("connectionForm");
            } else {
                // Handle the failure case
                throw new Exception("L'inscription a échoué.");
            }
        } else {
            // Display the subscription form
            $view = new View("Subscription");
            $view->render("subscriptionForm");
        }
    }


    public function disconnectUser() : void 
    {
        unset($_SESSION['user']);

        Utils::redirect("home");
    }

   
}