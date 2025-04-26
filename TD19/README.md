# Gestion de la fonctionnalité "Se souvenir de moi" (Remember Me)

Ce TD met en œuvre la fonctionnalité "Se souvenir de moi" sur un système de connexion utilisateur en PHP. Cette fonctionnalité permet aux utilisateurs de rester connectés même après la fermeture de leur navigateur.

## Objectifs
- Implémenter la persistance des sessions utilisateur à l'aide de cookies.
- Garantir la sécurité des données utilisateur lors de l'utilisation des cookies pour la connexion automatique.
- Gérer les sessions pour les pages privées de manière sécurisée.

## Fichiers clés

### `security.php`
Ce fichier contient la logique pour :
1. Vérifier si un utilisateur est déjà connecté via une session.
2. Effectuer une connexion automatique à l'aide d'un cookie contenant un jeton unique.
3. Rediriger les utilisateurs non connectés tentant d'accéder à des pages privées.

### `login.php`
Ce fichier gère :
1. L'authentification utilisateur en vérifiant le nom d'utilisateur et le mot de passe.
2. La création d'un cookie sécurisé pour la fonctionnalité "Se souvenir de moi".
3. La gestion des erreurs en cas d'identifiants invalides.

### `index.php`
Page principale accessible uniquement par des utilisateurs connectés. Elle utilise `security.php` pour vérifier l'état de connexion de l'utilisateur.

### `logout.php`
Ce fichier détruit la session utilisateur et redirige vers la page de connexion.

## Instructions

### Base de données requise
La table `users` doit contenir les colonnes suivantes :
- `id` (int) : Identifiant unique de l'utilisateur.
- `username` (varchar) : Nom d'utilisateur.
- `password` (varchar) : Mot de passe (haché).
- `name` (varchar) : Nom complet de l'utilisateur.
- `email` (varchar) : Adresse email de l'utilisateur.
- `phone` (varchar) : Numéro de téléphone.
- `token` (varchar) : Jeton unique pour la fonctionnalité "Se souvenir de moi".

### Exemple de flux utilisateur
1. Un utilisateur entre ses identifiants sur la page `login.php`.
2. Si l'utilisateur coche la case "Se souvenir de moi", un jeton unique est généré et enregistré dans la base de données et dans un cookie.
3. Lors de visites ultérieures, si le cookie est détecté, l'utilisateur est automatiquement connecté.
4. L'utilisateur peut se déconnecter via la page `logout.php`, ce qui supprime la session active.

## Bonnes pratiques de sécurité
- Hachez tous les mots de passe avec `password_hash()`.
- Nettoyez les données utilisateur avec `htmlspecialchars()` pour éviter les attaques XSS.
- Limitez la durée de vie des cookies (par exemple, 30 jours).