# Question
Créez une fonction PHP nommée `checkStringLength` qui prend en paramètres une chaîne de caractères `$str`, un minimum `$min` et un maximum `$max` (optionnel). 
La fonction doit vérifier que :
* La variable `$str` est bien une chaîne de caractères.
* La variable `$min` et `$max` sont des entiers.
* La longueur de la chaîne `$str` est supérieure ou égale à `$min` et inférieure ou égale à `$max` (si `$max` est spécifié). 
* Si `$max` n'est pas spécifié, la chaîne doit simplement être plus grande ou égale à `$min`.

La fonction doit retourner `true` si toutes les conditions sont remplies, sinon elle doit retourner `false`.