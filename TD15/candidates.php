<?php require_once '../functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Candidates</h1>
    <table border=1 cellpadding=5 cellspacing=0>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Position</th>
            <th>CV</th>
        </thead>
        <tbody>
            <?php
                $conn = getPDOConnection();
                $query = "SELECT * FROM candidate ORDER BY created_at DESC";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt = null;
                $conn = null;
                if(count($candidates) > 0){
                    foreach($candidates as $candidate){
                    ?>

                <tr>
                    <td><?=$candidate['name']?></td>
                    <td><?=$candidate['email']?></td>
                    <td><?=$candidate['birthdate']?></td>
                    <td><?=$candidate['gender'] == 'm' ? 'Male' : 'Female'?></td>
                    <td><?=$candidate['nationality']?></td>
                    <td><?=$candidate['position']?></td>
                    <td>
                        <a href='<?= $candidate['cv'] ?>' target='_blank'><?=$candidate['id']?>.pdf</a>
                    </td>
                </tr>
                    
                    <?php
                    }
                }

            ?>
        </tbody>
    </table>
</body>
</html>