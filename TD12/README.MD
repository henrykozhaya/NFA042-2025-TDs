## Question 1
Écris une fonction nommée `verifier_email($email)` pour vérifier si une adresse email est correctement formatée. 

Voici les instructions :
* Elle doit commencer par une lettre.
* Elle ne doit pas contenir de caractères spéciaux.
* Elle doit se terminer par une lettre.
* La casse (majuscules ou `minuscules) ne doit pas être prise en compte.
* Il doit y avoir au moins deux caractères avant le symbole @.
* Elle doit contenir le symbole @.
* Après le @, le nom de domaine doit comporter au moins deux lettres.
* Il doit être suivi d'un point.
* Suivi par l'extension TLD (.com, .net, .org...) avec au moins deux lettres

## Question 2
Écris une fonction nommée `verifier_cell_liban($num)` qui utilise `preg_match` pour vérifier si le numéro est un numéro de téléphone portable libanais. 

Les critères sont les suivants :

* Pas d'espaces.
* Il doit commencer par +961 ou 00961.
* Suivi par l'un de ces codes : 3, 70, 71, 76 ou 81.
* Suivi par 6 chiffres.