<?php
function traiterChaine($myString)
{
    $result = [
        "length" => strlen($myString),
        "reversedString" => str_split(strrev($myString))
    ];
    // La fonction doit vérifier si la chaîne est vide
    // Option 1: strlen
    if (strlen($myString) == 0) return false;
    // Option 2: empty
    if (empty($myString)) return false;

    return $result;
}
