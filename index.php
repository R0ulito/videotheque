<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de recherche</title>
</head>
<body>

<form action="recherche.php" method="get">
    <input type=search name='search' placeholder="tapez le titre du film..." />
</form>

<ul>
    <?php

    if (!file_exists('films.json')) {
        echo
        "<li><a href='init.php'>Initialiser la table de la videothèque</a></li>";
    }
    if (file_exists('films.json') && substr(file_get_contents('./films.json'), -2) != "]}"){
        echo
        '<li><a href="close.php">Clore la table de la videothèque</a></li>';
    }

    if (file_exists('films.json') && substr(file_get_contents('./films.json'), -2) == "]}") {
        echo
        '<li><a href="retake.php">Je veux recommencer à entrer des films dans la vidéothèque</a></li>';
    }
    ?>
</ul>


</body>
</html>