# Introduction

Ce répertoire Git contiendra les traveaux dirigés (TD) sur lesquels nous allons travailler.

# List of TDs
* [TD01](TD01/README.md): verifierAge() 
    * gettype(): Retourne le type de la variable passée en paramètre (ex. "integer", "string").
    * is_int(): Vérifie si la variable est de type entier (integer).
    * intval(): Convertit une variable en entier.

* [TD02](TD02/README.md): generateArrayOfIntegers($min, $max, $n)
    * rand(): Génère un nombre aléatoire compris entre deux limites données.
    * in_array(): Vérifie si une valeur donnée existe dans un tableau.
    * gettype(): Retourne le type de la variable passée en paramètre (utile pour valider les entrées).
    * count(): Retourne le nombre d'éléments dans un tableau.

* [TD03](TD03/README.md): checkNumberRange($n, $min, $max)
    * gettype(): Retourne le type de la variable passée en paramètre (permet de vérifier si `$n` est un nombre).
    * strlen(): Retourne la longueur d'une chaîne (utilisé pour des validations spécifiques si nécessaire).

* [TD04](TD04/README.md): checkStringLength($str, $min, $max = -1) 
    * strlen(): Retourne la longueur d'une chaîne de caractères (utilisé pour vérifier si elle respecte les limites `$min` et `$max`).

* [TD05](TD05/README.md): getAge($birthdate)
    * new DateTime(): Permet de manipuler des dates et heures de manière flexible (ici, pour gérer la date de naissance).
    * $a = $b->diff(): Calcule la différence entre deux objets `DateTime` (utilisé pour déterminer l'âge).
    * $a->format(): Formate le résultat de la différence dans un format lisible.

* [TD06](TD06/README.md): traiterChaine()
    * strrev(): Inverse une chaîne de caractères.
    * strlen(): Retourne la longueur d'une chaîne (utile pour analyser ou manipuler son contenu).