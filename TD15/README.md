# Gestion des Étudiants
## Préparations MySQL 
..
```SQL
CREATE TABLE candidate (
    id varchar(255) PRIMARY KEY,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    birthdate date NOT NULL,
    number_of_kids int NOT NULL,
    gender enum('m', 'f') NOT NULL,
    nationality enum('fr', 'us', 'lb') NOT NULL,
    message text NOT NULL,
    position enum('manager', 'supervisor', 'employee') NOT NULL,
    cv varchar(255) NOT NULL
);
```
* Insérer des enregistrements démo suivants :
```SQL
INSERT INTO student (nom, email, date_de_naissance) 
VALUES 
('Sam', 'sam@gmail.com', '2000-02-14'), 
('Joya', 'joya@gmail.com', '2000-02-10');

```
## PHP
* Créer un fichier index.php qui affiche le formulaire HTML suivant :
```HTML
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
```
* Au dessous du formulaire, créer un tableau qui affiche les informations des étudiants
* Créer le fichier create_etudiant.php qui enregistre les informations soumises après leur validation dans la base de données. Une fois ajoutées, la page doit être redirigée vers index.php pour afficher le tableau à jour.