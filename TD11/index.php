<?php
$data =
    [
        [
            "nom" => "Dupont",
            "prenom" => "Jean",
            "age" => 30
        ],
        [
            "nom" => "Durand",
            "prenom" => "Marie",
            "age" => 25
        ]
    ];


$csvFilename = sauvegarder_csv_fputcsv($data);

function sauvegarder_csv_fputcsv($data){
    $date = date('Y-m-d');
    $filename = $date . "-data.csv";
    $file = fopen($filename, 'w');
    fputcsv($file, array_keys($data[0]));
    foreach ($data as $personData) {
        fputcsv($file, $personData);
    }    
    fclose($file);
    return $filename;
}

function sauvegarder_csv_manual($data){
    /*
    nom,prenom,age
    Dupont,Jean,30
    Durand,Marie,25
    */ 
    $date = date('Y-m-d');
    $filename = $date . "-data.csv";
    $csvContents = '';

    $dataKeys = array_keys($data[0]);
    $csvContents .= implode(",", $dataKeys);
    $csvContents .= "\n";
    
    foreach($data as $personData){
        $csvContents .= implode(",", $personData) . "\n";
    }
    
    $file = fopen($filename, 'w');
    fwrite($file, $csvContents);
    fclose($file);

}

// csv_to_json("2025-03-22-data.csv");
csv_to_json($csvFilename);

function csv_to_json($csvFilename){
    if(!file_exists($csvFilename)) return;

    $csvFile = fopen($csvFilename, 'r');
    $jsonFilename = pathinfo($csvFilename, PATHINFO_FILENAME) . ".json";
    $jsonFile = fopen($jsonFilename, 'w');

    $data = [];

    $dataKeys = fgetcsv($csvFile);
    while( ($row = fgetcsv($csvFile)) !== false){
        $data[] = array_combine($dataKeys, $row);
    }
    fclose($csvFile);

    fwrite($jsonFile, json_encode($data));

    fclose($jsonFile);

}

ajouter_personne_csv('aaa', 'bbb', 18, '2025-03-22-data.csv');

function ajouter_personne_csv($nom, $prenom, $age, $filename){
    if(!file_exists($filename)) return;
    $file = fopen($filename, "a");
    // fwrite($file, "$nom,$prenom,$age\n");
    fputcsv($file, [$nom, $prenom, $age]);
    fclose($file);
}

ajouter_personne_json('ccc', 'ddd', 18, '2025-03-22-data.json');

function ajouter_personne_json($nom, $prenom, $age, $filename){
    if (!file_exists($filename)) return;
    $fileContents = file_get_contents($filename);
    $data = json_decode($fileContents);
    $data[] = [
        'nom' => $nom, 
        'prenom' => $prenom, 
        'age' => $age
    ];
    // I can use fopen with w flag and then fwrite
    
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    echo "Done";
}