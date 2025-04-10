<?php require_once '../functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <div>
        <h3>Add Student</h3>
        <form action="store_student.php" method="POST">
            <div style="margin-bottom:10px;">
                <div>Name</div>
                <div><input type="text" name="name" id=""></div>
            </div>
            <div style="margin-bottom:10px;">
                <div>Email</div>
                <div><input type="email" name="email" id=""></div>
            </div>
            <div style="margin-bottom:10px;">
                <div>Birthdate</div>
                <div><input type="date" name="birthdate" id=""></div>
            </div>
            <div>
                <div><input type="submit" name="" value="Add" id=""></div>
            </div>
        </form>
    </div>
    <div>
        <!-- Show Studens Information -->
        <h3>List of Students</h3>
        <table border='1' cellpadding='5' cellspacing='0'>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Birthdate</th>
        </thead>
        <tbody>
        <?php
        $conn = getPDOConnection();
        $query = "SELECT * FROM `student` ORDER BY `id` DESC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($students) > 0){
            foreach($students as $student){
                $birthdate = new DateTime($student['birthdate']);
                // OR
                // $birthdate = date('D j M Y', strtotime($student['birthdate']));
                echo "<tr>";
                echo "<td>".$student['name']."</td>";
                echo "<td>".$student['email']."</td>";
                echo "<td align='right'>".$birthdate->format('D j M Y')."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No students found!</td></tr>";
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>