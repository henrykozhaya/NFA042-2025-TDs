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
        <h3>Add new Student</h3>
        <form action="store_student.php" method="POST">
            <div style="margin-bottom:10px;">
                <div>Name</div>
                <div><input type="text" name="name" id="" value=''></div>
            </div>
            <div style="margin-bottom:10px;">
                <div>Email</div>
                <div><input type="email" name="email" id="" value=''></div>
            </div>
            <div style="margin-bottom:10px;">
                <div>Birthdate</div>
                <div><input type="date" name="birthdate" id="" value=''></div>
            </div>
            <div>
                <div><input type="submit" name="" value="Add" id=""></div>
            </div>
        </form> 
    </div>
    <div>
        <!-- Show Studens Information -->
        <h3>List of Students</h3>
        <table border=1 cellpadding=5 cellspacing=0>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>Edit</th>
            <th>Delete</th>
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
            ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td align='right'><?= $birthdate->format('D j M Y') ?></td>
                <td align='center'>
                    <a href="update_student.php?id=<?= $student['id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </td>
                <td align='center'>
                    <a href="delete_student.php?id=<?= $student['id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </a>
                </td>
            </tr>
            <?php
            }
        } else {
            echo "<tr><td colspan='6'>No students found!</td></tr>";
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>