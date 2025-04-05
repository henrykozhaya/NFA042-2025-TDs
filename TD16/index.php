<?php require_once '../functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>Ajouter de nouveaux enregistrements</h3>
        <form action="create_etudiant.php" method="POST">
            <div style="margin-bottom:10px;">
                <div>Nom</div>
                <div><input type="text" name="nom" id=""></div>
            </div>
            <div style="margin-bottom:10px;">
                <div>Email</div>
                <div><input type="text" name="email" id=""></div>
            </div>
            <div style="margin-bottom:10px;">
                <div>Date de Naissance</div>
                <div><input type="date" name="date_de_naissance" id=""></div>
            </div>
            <div>
                <div><input type="submit" name="" value="Ajouter un nouvel étudiant" id=""></div>
            </div>
        </form> 
    </div>
    <div>
        <!-- Show Studens Information -->
        <h3>Liste des étudiants</h3>
        <table border=1 cellpadding=5 cellspacing=0>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Birthdate</th>
        </thead>
        <tbody>
        <?php
        $conn = getPDOConnection();
        $query = "SELECT * FROM student ORDER BY id DESC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($students) > 0){
            foreach($students as $student){
                $date_de_naissance = new DateTime($student['date_de_naissance']);
                // $date_de_naissance = date('D j M Y', strtotime($student['date_de_naissance']));
                echo "<tr>";
                echo "<td>".$student['nom']."</td>";
                echo "<td>".$student['email']."</td>";
                echo "<td align='right'>".$date_de_naissance->format('D j M Y')."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Aucun étudiant trouvé</td></tr>";
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>