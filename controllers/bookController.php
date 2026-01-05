<?php

require_once ROOT . '/models/Book.php';

class BookController {

    public function index(): void
    {
        $books = Book::getAllAvailableWithUser();

        $view = ROOT . '/views/book/index.php';
        require ROOT . '/views/layout.php';
    }
}
