<?php
require_once ('functions.php');

if (!file_exists('films.json')) {
    echo "Erreur, le fichier n'a pas été initilisé";
}

if (file_exists('films.json') && substr(file_get_contents('./films.json'), -2) == "]}"){
    retakeJson();
}