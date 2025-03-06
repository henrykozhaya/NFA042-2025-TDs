<?php
function traiterChaine($str){
    if(empty($str)) return;

    return [
        'length' => strlen($str),
        'inversedStr' => strrev($str)
    ];    

}
