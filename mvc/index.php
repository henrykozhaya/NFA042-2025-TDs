<h3>Welcome to the Book Store</h3>

<?php
require_once __DIR__ . '/controllers/BookController.php';
$bookController = new BookController();
$bookController->index();
?>