## Mise à jour des étudiants
Ajoutez au TD 16 la possibilité de mettre à jour les données des étudiants. 
Pour ce faire, ajoutez une colonne dans le tableau de la page `index.php` appelée "Edit" avec l'icône convenable. 
Lorsque l'on clique sur cette icône, une page `update_student.php` doit s'ouvrir. 

Il faut envoyer l'ID de l'étudiant en paramètre GET, par exemple : `update_student.php?id=1`

* Si la requête est GET, la page `update_student.php` doit afficher le même formulaire mais avec les données actuelles de l'étudiant en question.
* Si la requête est POST, cela signifie que les données ont été modifiées et que le formulaire a été soumis. Dans ce cas, nous devons modifier les données dans la base de données puis rediriger l'utilisateur vers la page index.php.

## Suppression d'un étudiant
Ajoutez au TD 16 la possibilité de supprimer un étudiant.
Pour ce faire, ajoutez une colonne dans le tableau de la page `index.php` appelée "Delete" avec l'icône convenable. 
Lorsque l'on clique sur cette icône, le script doit se diriger vers une nouvelle page `delete_student.php?id=1` avec la méthode GET.

Cette page doit afficher un message de confirmation : "Êtes-vous sûr(e) de vouloir effacer l'étudiant {NOM} ?" avec deux boutons : oui et non.
* Si l'on clique sur oui, les données doivent être supprimées de la base de données. 
* Si non, le script doit rediriger l'utilisateur vers index.php.

Avant d'afficher le message de confirmation, le script doit s'assurer que l'étudiant existe. Sinon, il doit rediriger vers index.php.

Il faut toujours distinguer GET et POST. Si la requête est GET, on doit afficher le message, et si elle est POST, on doit supprimer l'étudiant et rediriger l'utilisateur vers index.php.
