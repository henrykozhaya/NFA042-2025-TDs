<?php

function afficher_date_heure(){   
    $date = date('d/m/Y H:i:s');
    echo <<<HTML
        <h3 id='dateContainer'><span style='color:red;'>$date</span></h3>
        <script>
            function updateTime(){
                const dateContainer = document.getElementById('dateContainer');
                const now = new Date();

                const day = String(now.getDate()).padStart(2,0);
                const month = String(now.getMonth() + 1).padStart(2,0);
                const year = String(now.getFullYear());
                const hour = String(now.getHours()).padStart(2, 0);
                const minute = String(now.getMinutes()).padStart(2, 0);
                const second = String(now.getSeconds()).padStart(2, 0);

                dateContainer.innerHTML = day + "/" + month + "/" + year + " " + hour + ":" + minute + ":" + second;
            }

            setInterval(updateTime, 1000);
        </script>
    HTML;
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style='padding:100px;text-align:center;'>
        <?php afficher_date_heure() ?> 
    </div>
</body>
</html>