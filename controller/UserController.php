<?php 

class UserController {


    public function showUser() : void
    {
        $this->checkIfUserIsConnected();

        $userManager = new UserManager();

        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Useristration");
        $view->render("User", [
            'Books' => $books,
        ]);
    }

    private function checkIfUserIsConnected() : void
    {
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
        }
    }

    public function displayConnectionForm() : void 
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }

    public function connectUser() : void 
    {
        $email = Utils::request("email");
        $password = Utils::request("password");

        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByLogin($email);
        if (!$user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        if (!password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            throw new Exception("Le mot de passe est incorrect : $hash");
        }

        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();

        var_dump($_SESSION['user']);
    
        Utils::redirect("User");    
    }

    public function disconnectUser() : void 
    {
        unset($_SESSION['user']);

        Utils::redirect("home");
    }

    public function showUpdateBookForm() : void 
    {
        $this->checkIfUserIsConnected();

        $id = Utils::request("id", -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        if (!$book) {
            $book = new Book();
        }

        $view = new View("Edition d'un Book");
        $view->render("updateBookForm", [
            'Book' => $book
        ]);
    }

    public function updateBook() : void 
    {
        $this->checkIfUserIsConnected();

        $id = Utils::request("id", -1);
        $title = Utils::request("title");
        $content = Utils::request("content");

        if (empty($title) || empty($content)) {
            throw new Exception("Tous les champs sont obligatoires. 2");
        }

        $book = new Book([
            'id' => $id, 
            'title' => $title,
            'content' => $content,
            'id_user' => $_SESSION['idUser']
        ]);

        $bookManager = new BookManager();
        $bookManager->addOrUpdateBook($book);

        Utils::redirect("User");
    }

    public function deleteBook() : void
    {
        $this->checkIfUserIsConnected();

        $id = Utils::request("id", -1);

        $bookManager = new BookManager();
        $bookManager->deleteBook($id);

        Utils::redirect("User");
    }
}