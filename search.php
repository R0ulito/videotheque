<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>formulaire de recherche</title>
</head>
<body>

<form action="test.php" method="get">
    <input type="text" placeholder="tapez votre recherche">
    <ul></ul>
</form>
<script>
    const film = "films.json";

    const films = [];

    fetch(film)
        .then(blob => blob.json())
    .then(data => films.push(...data.films));

    function findFilm(recherche, films) {
        return films.filter(film => {
                const regex = new RegExp(recherche, 'gi')
                return film.title.match(regex) || film.castingShort.actors.match(regex) || film.castingShort.directors.match(regex)
            });
    }

    function showResults(){
        const resultArray = findFilm(this.value, films);
        const html = resultArray.map(film => {
                return `
<li>
<img width="64" height="96" float:left' src='${film.posterURL}'/>
<span>${film.title}</span>
<span>(${film.productionYear})</span>
<span>film de ${film.castingShort.directors}</span>
</li>
`;
            }).join('');
        console.log(resultArray);
        liste.innerHTML = html;
    }
    const input = document.querySelector('input');
    const liste = document.querySelector('ul');

    input.addEventListener('change', showResults);
    input.addEventListener('keyup', showResults);


</script>

</body>
</html>