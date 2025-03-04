<?php
function verifierAge1($age)
{
    if (intval($age) === $age && $age >= 0 && $age <= 100) return true;
    return false;
}
function verifierAge2($age)
{
    return is_int($age) && $age >= 0 && $age <= 100;
}
function verifierAge3($age)
{
    return gettype($age) == "integer" && $age >= 0 && $age <= 100;
}
