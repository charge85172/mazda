<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DashboardController.php

require_once __DIR__ . '/../../Models/BookModel.php';

class DashboardController extends Controller
{
    /**
     * Toont het dashboard met de boeken van de gebruiker.
     * Vereist dat de gebruiker is ingelogd.
     */
    public function index()
    {
        // Stap 1: Vereis dat de gebruiker is ingelogd.
        $this->requireLogin();

        // Stap 2: Haal de boeken van de gebruiker op via het model.
        $bookModel = new BookModel();
        $user_id = $_SESSION['user_id'];
        $books = $bookModel->getBooksByUserId($user_id);

        // Stap 3: Laad de view en geef de data door.
        $this->loadView('dashboard', ['books' => $books]);
    }
}

?>
