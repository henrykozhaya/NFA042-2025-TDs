<?php
require_once __DIR__ . '/../models/Book.php';
class BookController{
    public function index(){
        $books = Book::get();
        require_once __DIR__ . '/../views/books.php';
    }
    
}