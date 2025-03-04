<?php
function checkNumberRange($n, $min, $max)
{
    return gettype($n) == 'integer' &&
        gettype($min) == 'integer' &&
        gettype($max) == 'integet' &&
        $n >= $min &&
        $n <= $max;
}