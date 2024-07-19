<?php

/**
 * Class ProfilePageController
 *
 * Manages the display of the home page and user profile page.
 */
class ProfilePageController
{
    /**
     * Displays the home page with the latest books.
     *
     * @return void
     * @throws Exception If an error occurs while fetching the latest books.
     */
    public function showHome(): void
    {

        try {
            $bookManager = new BookManager();
            $latestBooks = $bookManager->getLatestBooks();
            $view = new View("Home");
            $view->render("home", ['latestBooks' => $latestBooks]);
        } catch (Exception $e) {
            $view = new View("Error");
            $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
        }
    }

    /**
     * Displays the user profile page.
     *
     * @return void
     * @throws Exception If the user is not found.
     */
    public function showProfile(): void
    {
        $userManager = new UserManager();

        $userId = Utils::request("id");
        $user = $userManager->getUserById($userId);

        if (!$user) {

            echo "<p>User not found.</p>";
            return;
        }

        $bookManager = new BookManager();
        $userBooks = $bookManager->getUserBooks($userId);
        $totalBooks = $bookManager->countUserBooks($userId);

        $view = new View("Profile");
        $view->render("profilePublic", ['user' => $user, 'userBooks' => $userBooks, 'totalBooks' => $totalBooks]);
    }
}
