<?php
require_once "../functions.php";

if(!isset($_GET["id"]) || intval($_GET["id"]) <= 0){
    http_response_code(400);
    die("Bad Request - ID is not valid");
}

$id = intval($_GET["id"]);

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $query = "SELECT * FROM student WHERE id = :id";
    $conn = getPDOConnection();
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Les informations de l'étudiant concerné se trouvent dans $data[0] car nous avons utilisé la méthode fetchAll
    } catch (PDOException $e) {
        die("Erreur PDO: " . $e->getMessage());
    } finally{
        $stmt = null;
        $conn = null;
    }

    if(count($data) == 0){
        die("No results found!");
    }
    
    ?>
    <!-- HTML PART -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Student</title>
    </head>
    <body>
        <div>
            <h3>Update Student ID: <?= $data[0]["id"] ?></h3>
            <form action="update_student.php?id=<?= $data[0]['id'] ?>" method="POST">
                <div style="margin-bottom:10px;">
                    <div>Name</div>
                    <div><input type="text" name="name" id="" value='<?= $data[0]["name"] ?>'></div>
                </div>
                <div style="margin-bottom:10px;">
                    <div>Email</div>
                    <div><input type="text" name="email" id="" value='<?= $data[0]["email"] ?>'></div>
                </div>
                <div style="margin-bottom:10px;">
                    <div>Birthdate</div>
                    <div><input type="date" name="birthdate" id="" value='<?= $data[0]["birthdate"] ?>'></div>
                </div>
                <div>
                    <div><input type="submit" name="" value="Update" id=""></div>
                </div>
            </form> 
        </div> 
    </body>       
    </html>       
    <!-- END OF HTML PART -->
    <?php
}
else if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if
    (
        isset($_POST['name']) 
        && isset($_POST['email']) 
        && isset($_POST['birthdate'])
        && !empty($_POST['name'])
        && !empty($_POST['email'])
        && !empty($_POST['birthdate'])
    )
    {
        extract($_POST);
        $name = htmlspecialchars($name);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            die("Invalid email format");
        }

        if(strtotime($birthdate) === false) {
            http_response_code(400);
            die("Invalid date format");
        }

        if(strtotime($birthdate) > time()) {
            http_response_code(400);
            die("Date of birth cannot be in the future");
        }

        $conn = getPDOConnection();
        $query = "UPDATE `student` SET `name` = :name, `email` = :email, `birthdate` = :birthdate WHERE `id` = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
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
}
else{
    http_response_code(405);
    die();
}