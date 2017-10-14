<?php
require_once ('functions.php');
if (!file_exists('films.json')) {
    initJson();
    header('Location:index.php');
}
if (file_exists('films.json')) {
    echo "<h2>Petit malin</h2> <h3>Tu n'as rien à faire là</h3> <br />";
    echo " <button><a href='index.php' style='text-decoration: none;'>Tu m'as grillé, je file </a></button>";
}



?>