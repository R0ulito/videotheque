<?php
header('Content-Type: text/html; charset=iso-8859-15');

require_once ('api-allocine-helper/api-allocine-helper.php');
require_once ('functions.php');
$helper = new AlloHelper;

$title = implode(" ", $_GET['title']);
$titles = addslashes($title);
echo $titles;

$search = $_GET['title'];
$test = $helper->search($q = $titles, $page = 1, $count = count($_GET['title']), $json = 1, $filter = ['movie', 'person']);


for ($i = 0; $i < count($test->movie); $i ++ ) {
    fillJson($test->movie->_data[$i]);
    echo $test->movie->title. " a &eacute;t&eacute; ajout&eacute;!";
}

?>