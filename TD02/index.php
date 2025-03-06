<?php
function generateArrayOfIntegers($min, $max, $n)
{
    $result = [];
    if (gettype($min) == 'integer' && gettype($max) == 'integer' && gettype($n) == 'integer') {
        while (count($result) < $n) {
            $randomNumber = rand($min, $max);
            if (!in_array($randomNumber, $result)) {
                array_push($result, $randomNumber);
            }
        }
        sort($result);
    }
    return $result;
}
