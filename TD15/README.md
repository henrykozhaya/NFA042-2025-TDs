# Gestion des Candidatures

Ce projet est une application web simple permettant de gérer des candidatures. Il inclut des fonctionnalités pour soumettre un formulaire de candidature, stocker les informations dans une base de données MySQL, et afficher la liste des candidats dans une interface.

## Fonctionnalités

- Soumission de formulaires pour les candidats incluant des informations personnelles et un CV au format PDF.
- Validation des données côté serveur pour garantir la qualité et l'intégrité des données.
- Stockage sécurisé des mots de passe à l'aide de hachage bcrypt.
- Gestion des fichiers téléchargés (CV) dans une structure organisée par année et mois.
- Affichage des candidats avec des détails complets dans un tableau HTML.

## Structure des fichiers

- **index.php**: Formulaire HTML permettant aux candidats de soumettre leurs informations.
```HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumission de formulaire</title>
</head>

<body>
    <div>
        <a href="candidates.php">Candidates</a>
    </div>

    <h3>Connexion</h3>
    <form action="save_candidate.php" method="post" enctype='multipart/form-data' >
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
        <br><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <br><br>
        <label for="birthdate">Date de naissance</label>
        <input type="date" name="birthdate" id="birthdate">
        <br><br>
        <label for="number_of_kids">Nombre d'enfants</label>
        <input type="number" name="number_of_kids" id="number_of_kids">
        <br><br>
        Genre :<br>
        <input type="radio" id="gender_m" name="gender" value="m" >
        <label for="gender_m">Homme</label><br>
        <input type="radio" id="gender_f" name="gender" value="f">
        <label for="gender_f">Femme</label>
        <br><br>

        <label>Nationalité :</label><br>
        <select name="nationality" id="">
            <option value="fr">France</option>
            <option value="us">États-Unis</option>
            <option value="lb">Liban</option>
        </select>

        <br><br>
        <label for="message">Message</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <br><br>

        <label for="position">Poste</label>
        <select name="position" id="position">
            <option value="manager">Manager</option>
            <option value="supervisor">Superviseur</option>
            <option value="employee">Employé</option>
        </select>
        <br><br>

        <label for="cv">Télécharger votre CV</label>
        <input type='file' name="cv" id="cv" accept='application/pdf' />
        <br><br>

        <input type="submit" value="Soumettre">
    </form>
</body>

</html>
```
- **save_candidate.php**: Script PHP pour valider, traiter, et enregistrer les données soumises, y compris le téléchargement des CV.
- **candidates.php**: Interface pour afficher la liste des candidats enregistrés dans un tableau.

## Préparation MySQL

Exécutez le script suivant pour créer la table nécessaire dans votre base de données :

```sql
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
````
## Validations

1. **Nom** : Doit contenir au moins 2 caractères.
2. **Email** : Doit être une adresse email valide.
3. **Mot de passe** : 
   - Doit comporter au moins 8 caractères.
   - Inclure au moins :
     - 1 chiffre,
     - 1 lettre majuscule,
     - 1 lettre minuscule,
     - 1 caractère spécial.
4. **Date de naissance** : Doit être antérieure à la date actuelle.
5. **Nationalité** : Doit être l’une des valeurs suivantes : `fr`, `us`, `lb`.
6. **Message** : Doit contenir un minimum de 10 caractères.
7. **Nombre d’enfants** : Doit être un nombre positif ou égal à 0.
8. **Poste** : Doit être l’une des valeurs suivantes : `manager`, `supervisor`, `employee`.
9. **CV** :
   - Aucun problème de téléchargement ne doit survenir.
   - Le fichier doit être au format PDF.
   - La taille maximale est de 5 Mo.

---

## Téléchargement du CV

- Les fichiers CV doivent être stockés dans le répertoire suivant : `uploads/cv/{année}/{mois}/`.
- Le nom du fichier doit être généré aléatoirement à l’aide de la fonction `uniqid()`.
- Le chemin complet du fichier doit être enregistré dans la base de données pour un usage futur.