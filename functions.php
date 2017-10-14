<?php

function initJson ($file='films.json') {
    $string = '{
    "films": [
    ';
    file_put_contents($file, $string);
}

function fillJson ( $data, $file = 'films.json') {
    $string = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($file, $string, FILE_APPEND | LOCK_EX);
    file_put_contents($file, ",
", FILE_APPEND | LOCK_EX);
}

function closeJson ($file = 'films.json') {
    $table = substr(file_get_contents('./films.json'),0, -3);
    $endstring = "]}";
    file_put_contents($file, $table);
    file_put_contents($file, $endstring, FILE_APPEND | LOCK_EX);
}

function retakeJson ($file = "films.json") {
    $table = substr(file_get_contents('./films.json'),0, -2);
    file_put_contents($file, $table);
    file_put_contents($file, ",
", FILE_APPEND | LOCK_EX);
}


?>