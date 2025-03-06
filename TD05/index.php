<?php
function getAge($birthdate)
{
    $age = null;
    $today = new DateTime();
    $birthdate = new DateTime($birthdate);
    $age = $today->diff($birthdate);
    return (int)$age->format('%y');
}