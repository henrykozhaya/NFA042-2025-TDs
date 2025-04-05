<?php
function getPDOConnection()
{
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "nfa008";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

function getMySQLiConnection()
{
    try {
        mysqli_report(MYSQLI_REPORT_OFF);

        $servername = "127.0.0.1";
        $username = "root1";
        $password = "";
        $dbname = "nfa008";

        $conn = @new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

$conn = getMySQLiConnection();
try {
    $sql = "SELECT isbn, titre, prix FROM livre WHERE auteur_id = 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_all();
        echo json_encode($data);
    } else {
        echo "Pas de résultat";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}



// $conn = getPDOConnection();
// $auteurID = 17; 
// $nom = "Johnny";
// $sql = "UPDATE auteur SET nom = :nom WHERE id = :id";
// try {
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
// $stmt->bindParam(':id', $auteurID, PDO::PARAM_INT);
// $stmt->execute();
// if ($stmt->rowCount() !== false) {
// echo "Enregistrement avec succès - Affected Rows " . $stmt->rowCount();
// }
// } catch (PDOException $e) {
// echo "Erreur PDO: " . $e->getMessage();
// } finally{
// $stmt = null;
// $conn = null;
// }


// $conn = getPDOConnection();
// $nom = "Kozhaya";
// $prenom = "Henry";
// $prix = 10;
// $auteurID = 3;
// try {
//     $sql = "INSERT INTO auteur (nom, prenom) VALUES (:nom, :prenom)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
//     $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
//     $stmt->execute();
//     $rowsAffected = $stmt->rowCount();
//     $lastInsertId = $conn->lastInsertId();
//     if ($rowsAffected !== false) {
// 	    echo "Nouvel enregistrement créé avec succès - ID: $lastInsertId";
//     }
// } 
// catch (PDOException $e) {
// 	echo "Erreur PDO: " . $e->getMessage();
// } finally{
//     $conn = null;
// }
// $conn = getPDOConnection();
// $isbn = "978-3-16-148410-5";
// $titre = "Introduction à MySQL";
// $prix = 10;
// $auteurID = 3;
// try {
//     $sql = "INSERT INTO livre (isbn, titre, prix, auteur_id) VALUES (:isbn, :titre, :prix, :auteurID)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);
//     $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
//     $stmt->bindParam(':prix', $prix, PDO::PARAM_INT);
//     $stmt->bindParam(':auteurID', $auteurID, PDO::PARAM_INT);
//     $stmt->execute();
//     $rowsAffected = $stmt->rowCount();
//     if ($rowsAffected !== false) {
// 	    echo "Nouvel enregistrement créé avec succès - Nb de ligne(s) ajoutée(s): $rowsAffected";
//     }
// } 
// catch (PDOException $e) {
// 	echo "Erreur PDO: " . $e->getMessage();
// } finally{
//     $conn = null;
// }