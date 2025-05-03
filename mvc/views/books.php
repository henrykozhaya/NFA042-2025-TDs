<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <thead>
            <th>ISBN</th>
            <th>Title</th>
            <th>Price</th>
            <th>Year</th>
        </thead>
        <tbody>
            <?php
                foreach($books as $book){
                    echo "<tr>";
                    echo "<td>" . $book['isbn'] . "</td>";
                    echo "<td>" . $book['title'] . "</td>";
                    echo "<td>" . $book['price'] . "</td>";
                    echo "<td>" . $book['year'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>