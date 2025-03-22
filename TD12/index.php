<?php
function verifier_email($email)
{
    // Définir le modèle pour la validation de l'email
    $pattern = '/^[a-zA-Z][a-zA-Z0-9]+@[a-zA-Z]{2,}\.[a-zA-Z]{2,}$/';

    // Vérifier si l'email correspond au modèle
    if (preg_match($pattern, $email)) {
        return true;
    }

    return false;
}

$emails = [
    "john@isae.edu.lb",
    "john@cnam.fr",
    "j0hn@cnam.fr", // Zero à la place de o
    "john@cnam.fr",
    "john@cnam.fr",
    "j4@cnam.fr",
    "j@cnam.fr",
    "jo@cnam.fr",
    "jo@c.fr",
    "jo@cnam.f",
    "jo@cnam.com",
    "jo@cnam.group",
    "jo@cnam.com@Liban",
];

foreach ($emails as $email) {
    echo $email, " - ", verifier_email($email), "\n";
}

function verifier_cell_liban($num): bool
{
    $pattern = "/^(\+961|00961)(3|70|71|76|81)\d{6}$/";
    return preg_match($pattern, $num);
}

$nums = [
    "+961 70 500 560", // false
    "+96170500560", // true
    "0096170500560", // true
    "0096103500560", // false
    "009613500560", // true
    "009617050056", // false
    "009619500560", // false
    "0096129500560", // false
    "@Henry0096170500560Liban", // false
];

foreach ($nums as $num) {
    echo $num, " - ", verifier_cell_liban($num), "\n";
}