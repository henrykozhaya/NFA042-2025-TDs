<?php

function afficher_tableau($arr){
    if(!$arr) return;

    echo <<< HTML
    <table border=1 cellpadding=5 cellspacing=0>
        <thead>
            <tr>
    HTML;
    
    $tableHeader = array_shift($arr);

    foreach($tableHeader as $cellHeader){
        echo "<th>$cellHeader</th>";
    }

    echo <<< HTML
            </tr>
        </thead>
        <tbody>
    HTML;
    
    // Methode 1:
    // $strippedClass = "";
    // foreach($arr as $line){
    //     echo "<tr class='$strippedClass'>";
    //     foreach($line as $cell){
    //         echo "<td>$cell</td>";
    //     }
    //     echo "</tr>";
    //     $strippedClass = empty($strippedClass) ? "stripped" : "";
    // }

    // Methode 2:
    for($i = 0; $i < count($arr); $i++){
        if($i%2 == 0) $strippedClass = "stripped";
        else $strippedClass = "";
        
        echo "<tr class='$strippedClass'>";
        foreach($arr[$i] as $cell){
            echo "<td>$cell</td>";
        }
        echo "</tr>";        
    }

    echo <<< HTML
        </tbody>
    </table>
    HTML;    
}


$students = array(
    array("Name", "Age", "Country"),
    array("John", 25, "USA"),
    array("Alice", 30, "UK"),
    array("Bob", 22, "Canada"),
    array("Emily", 28, "Australia"),
    array("David", 35, "Germany")
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .stripped{
            background-color: #eee;
        }
    </style>
</head>
<body>
    <?php afficher_tableau($students); ?>
</body>
</html>
