# Gestion des Étudiants
## Préparations MySQL 
* Créer une base de données MySQL nommée `NFA042-2025-TDS"
* Créer un utilisateur MySQL nommé "NFA042" avec un mot de passe "NFA042@PASS"
* Créer la table étudiant suivante:
```SQL
CREATE TABLE `student` (
    `id` int AUTO_INCREMENT,
    `name` varchar(255) not null,
    `email` varchar(255) not null,
    `birthdate` date,
    primary key (`id`)
);
```
* Insérer des enregistrements démo suivants :

```SQL
INSERT INTO `student` (`name`, `email`, `birthdate`) 
VALUES 
('Sam', 'sam@gmail.com', '2007-02-14'), 
('Joya', 'joya@gmail.com', '2007-02-10');
```
## PHP
* Créer un fichier `index.php` qui affiche le formulaire HTML suivant :
```HTML
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
```
* Au dessous du formulaire, créer un tableau qui affiche les informations des étudiants
* Créer le fichier `store_student.php` qui enregistre les informations soumises après leur validation dans la base de données. Une fois ajoutées, la page doit être redirigée vers `index.php` pour afficher le tableau à jour.