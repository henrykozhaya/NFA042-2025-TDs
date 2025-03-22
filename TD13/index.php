<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumission de formulaire</title>
</head>

<body>
    <h3>Connexion</h3>
    <form action="save_form.php" method="post">
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
        <input type="radio" id="gender_m" name="gender" value="m">
        <label for="gender_m">Homme</label><br>
        <input type="radio" id="gender_f" name="gender" value="f">
        <label for="gender_f">Femme</label>
        <br><br>

        <label>Nationalité :</label><br>
        <label for="lb">Liban</label>
        <input type="checkbox" name="nationality[]" id="lb" value="lb"><br>
        <label for="fr">France</label>
        <input type="checkbox" name="nationality[]" id="fr" value="fr"><br>
        <label for="us">États-Unis</label>
        <input type="checkbox" name="nationality[]" id="us" value="us"><br>

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

        <label for="skills">Compétences</label>
        <select name="skills[]" id="skills" multiple>
            <option value="word">Word</option>
            <option value="excel">Excel</option>
            <option value="programming">Programmation</option>
        </select>
        <br><br>

        <input type="submit" value="Soumettre">
    </form>
</body>

</html>