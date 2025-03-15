<?php
function creer_variable_globale($key, $value){
    if( isset($GLOBALS[$key]) ) return false;
    $GLOBALS[$key] = $value;
}

function modifier_variable_globale($key, $value){
    if( isset($GLOBALS[$key]) ){
        $GLOBALS[$key] = $value;
    }
    else{
        return false;
    }
}

function afficher_variable_globale($key){
    if( isset($GLOBALS[$key]) ){
        echo $GLOBALS[$key];
    }
    else{
        return false;
    }
}

creer_variable_globale('charbel', 'cnam');
modifier_variable_globale('charbel', 'cnam');
afficher_variable_globale('charbel');