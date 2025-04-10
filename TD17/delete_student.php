<?php
require_once "../functions.php";

if(!isset($_GET["id"]) || intval($_GET["id"]) <= 0){
    http_response_code(400);
    die("Bad Request - ID is not valid");
}

$id = intval($_GET["id"]);

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $conn = getPDOConnection();
    $query = "SELECT * FROM `student` WHERE `id` = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <!-- HTML PART -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Student</title>
    </head>
    <body>
        <div>
            <form action="delete_student.php?id=<?= $data['id'] ?>" method="POST">
                <h3>Are you sure you want to delete the student: <?= $data["name"] ?></h3>
                <div>
                    <input type="submit" name="" value="Yes" id="">
                    <input type="button" name="" value="No" id="" onclick="document.location.href='index.php'">
                </div>
            </form> 
        </div> 
    </body>       
    </html>       
    <!-- END OF HTML PART -->

    <?php
}
else if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn = getPDOConnection();
    $query = "DELETE FROM `student` WHERE `id` = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if($stmt->execute()){
        $stmt = null;
        $conn = null;
        header("location: index.php");
        exit();
    } else {
        http_response_code(500);
        die("Failed to add student");
    }    
}

else{
    http_response_code(405);
    die();
}