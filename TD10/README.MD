## Question 1
Soit le tableau "students" suivant:

```php
$students = array(
    array("Name", "Age", "Country"),
    array("John", 25, "USA"),
    array("Alice", 30, "UK"),
    array("Bob", 22, "Canada"),
    array("Emily", 28, "Australia"),
    array("David", 35, "Germany")
);
```

Créez une fonction PHP appelée `afficher_tableau` qui prend en paramètre un tableau (array) et qui affiche un tableau en HTML en tenant compte que le premier élément du tableau (array) sera les titres du tableau HTML.

## Question 2
Chaque ligne du tableau HTML doit avoir une couleur différente : la première ligne en gris, la deuxième en blanc, la troisième en gris, la quatrième en blanc, etc.