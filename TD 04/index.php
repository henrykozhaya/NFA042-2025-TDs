<?php
function checkStringLength($str, $min, $max = -1)
{
    return gettype($str) == 'string' &&
        gettype($min) == 'integer' &&
        gettype($max) == 'integer' &&
        strlen($str) >= $min &&
        ($max == -1 || strlen($str) <= $max);
}