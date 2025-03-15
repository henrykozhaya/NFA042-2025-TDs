<?php
function affichier_jours_semaine(){
    $days = [];
    $date = new DateTime('Monday');
    
    for($i = 0; $i < 7; $i++){
        array_push($days, $date->format('l'));
        $date->modify('+1 day');
        // echo $date->format('l');
        // echo $days[$i] . "\n";
    }

    return $days;
}

function draw_table($days, $data){
    $html = "<table border=1 cellpadding=5 cellspacing=0>";
    $html .= "<thead>";
    $html .= "<th>Period</th>";
    foreach($days as $day){
        $html .= "<th>$day</th>";
    }
    $html .= "</thead>";
    $html .= "<tbody>";

    foreach($data as $periodKey => $periodeDetails){
        $html .= "<tr>";
        $html .= "<td>$periodKey</td>";
        
        foreach($periodeDetails as $day=>$dayDetails){
            $html .= "<td>$dayDetails</td>";
        }
        $html .= "<td></td>";
        $html .= "<td></td>";
        $html .= "</tr>";
    }
    $html .= "</tbody>";
    $html .= "</table>";

    return $html;
}

$data = [
    "Period 1" => [
        "Mon" => "",    
        "Tue" => "English",    
        "Wed" => "",    
        "Thu" => "French",    
        "Fri" => "",    
    ],
    "Period 2" => [
        "Mon" => "",    
        "Tue" => "English",    
        "Wed" => "",    
        "Thu" => "French",    
        "Fri" => "",    
    ],
    "Period 3" => [
        "Mon" => "PHP & MySQL",    
        "Tue" => "Databases",    
        "Wed" => "Maths",    
        "Thu" => "Web 3",    
        "Fri" => "Java",    
    ],
    "Period 4" => [
        "Mon" => "PHP & MySQL",    
        "Tue" => "Databases",    
        "Wed" => "Maths",    
        "Thu" => "Web 3",    
        "Fri" => "Java",    
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= draw_table(affichier_jours_semaine(), $data) ?>
</body>
</html>
