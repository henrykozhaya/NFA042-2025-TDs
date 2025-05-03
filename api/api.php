<?php
require_once '../functions.php';

if(!isset($_GET['action'])) {
    http_response_code(404);
    exit;
} 

header('Content-Type: application/json; charset=utf-8');

$action = $_GET['action'];
$method = $_SERVER['REQUEST_METHOD'];

// http://localhost/api.php?action=getBooks GET
// http://localhost/api.php?action=getAuthors GET
// http://localhost/api.php?action=createBook POST

if($method == "GET" && in_array($action, ['getBooks', 'getAuthors']) && function_exists($action)){
        $action();
}
else if($method == "POST" && in_array($action, ['createBook']) && function_exists($action)){
        $action();
} 
else{
    http_response_code(405);
}

function getBooks(){
    $conn = getPDOConnection();
    $query = "SELECT * FROM book";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    $stmt = null;
    exit(json_encode($books, JSON_PRETTY_PRINT));
}

function getAuthors(){
    $conn = getPDOConnection();
    $query = "SELECT * FROM author";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    $stmt = null;
    exit(json_encode($books, JSON_PRETTY_PRINT));
}

function createBook(){
    $data = json_decode(file_get_contents('php://input'), true);

    if(!isset($data['isbn']) || strlen($data['isbn']) != 17){
        http_response_code(400);
        exit(json_encode(array("message" => "ISBN is required.")));
    }
    
    if(!isset($data['title']) || strlen($data['title']) < 3){
        http_response_code(400);
        exit(json_encode(array("message" => "Title is required.")));
    }
    
    if(!isset($data['author_id']) || !in_array($data['author_id'], range(1, 10))){
        http_response_code(400);
        exit(json_encode(array("message" => "Author is required.")));
    }

    if(!isset($data['year']) || !in_array($data['year'], range(1900, 2025))){
        http_response_code(400);
        exit(json_encode(array("message" => "Year is required.")));
    }

    if(!isset($data['price']) || !is_numeric($data['price']) || intval($data['price']) < 0){
        http_response_code(400);
        exit(json_encode(array("message" => "Price is required.")));
    }

    $conn = getPDOConnection();
    $query = "INSERT INTO book (isbn, title, year, author_id, price) VALUES (:isbn, :title, :year, :author_id, :price)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':isbn', $data['isbn']);
    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':year', $data['year']);
    $stmt->bindParam(':author_id', $data['author_id']);
    $stmt->bindParam(':price', $data['price']);
    if($stmt->execute()){
        echo json_encode(array("message" => "Book created successfully."));
    } else {
        echo json_encode(array("message" => "Failed to create book."));
    }
    $conn = null;
    $stmt = null;
    exit;
}