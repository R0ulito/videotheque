<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
<?php
header('Content-Type: text/html; charset=iso-8859-15');
/**
 * Created by PhpStorm.
 * User: Touliro
 * Date: 23/05/2017
 * Time: 23:00
 */

//max_id_found = 61772

require_once ('./api-allocine-helper/api-allocine-helper.php');
require_once ('functions.php');

$helper = new AlloHelper;

$search = $_GET['search'];
$test = $helper->search($q = $search, $page = 1, $count = 10, $json = 1, $filter = ['movie', 'person']);
//print_r($test);


?>
<h2>Choissisez le film parmi la liste et valider avec le bouton situ&eacute; en bas</t></h2>


    <form action="tr_films.php" method="get">
<ul style="list-style: none; display: block">
    <?php

for ($i = 0; $i < count($test->movie); $i ++ ) {
    $imageURL = $test->movie[$i]->poster;
    $titre = htmlspecialchars($test->movie[$i]->title, ENT_QUOTES, "ISO8859-1");
    $title = $test->movie[$i]->title;
    $year = $test->movie[$i]->productionYear;
    $producer = $test->movie[$i]->castingShort->directors;
    echo "
    <li style='width: 48%; border: 1px solid silver; box-shadow: 1px 2px 5px silver; margin-bottom: 2px; padding: 2px; float: left'><input type='radio' name='title[]' value='$titre' style='float: left'> ";
    echo "
        <img style='float: left; border-radius: 5px;' src=$imageURL width='64' height='96' /> ";
    echo "<h3> $title </h3><br /> Film de " .$producer. "(". $year . ")";

    echo "
    </li>
    ";
}
?>

</ul>
        <button type="submit">Choisir ce film</button>
    </form>