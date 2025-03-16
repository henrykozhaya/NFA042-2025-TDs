## Question 1
Créez une fonction PHP qui prend en paramètre un tableau associatif et le sauvegarde dans un fichier CSV nommé comme suit : `{year}-{month}-{day}-data.csv`.

Exemple de données :
```php
$data = [
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
```
## Question 2:
Créez une fonction PHP qui lit un fichier CSV et le sauvegarde au format JSON.

Le nouveau fichier doit avoir le même nom, mais avec une extension .json.

## Question 3:
Ajoutez une fonction `ajouter_personne_csv($nom, $prenom, $age, $fichier)` permettant d'ajouter de nouvelles données au fichier CSV existant.

## Question 4:
Ajouter une fonction `ajouter_personne_json($nom, $prenom, $age, $fichier)` permettant d'ajouter de nouvelles données au fichier JSON existant.