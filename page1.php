<?php
$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films
$nom = array_column($top, "im:name");
$titre = array_column($nom,"label");

//Afficher le top10 des films
echo "Afficher le top10 des films<br><br>";

for($i =0; $i < 11; $i++){
    echo $top[$i]["im:name"]["label"]."<br>";
}
echo "<br>";

//Quel est le classement du film « Gravity » ?
echo "Quel est le classement du film « Gravity » ?<br><br>";

echo "le film 'Gravity' ce trouve en ".array_search("Gravity",$titre)." em position<br>";
echo "<br>";

//Quel est le réalisateur du film « The LEGO Movie » ?
echo "Quel est le réalisateur du film « The LEGO Movie » ?<br><br>";

echo "le realisateur du film 'lego movie' est : ".$top[array_search("The LEGO Movie",$titre)]["im:artist"]["label"]."<br>";
echo "<br>";

//Combien de films sont sortis avant 2000 ?
echo "Combien de films sont sortis avant 2000 ?<br><br>";

$date = 0;
$tabFilm =[];
foreach($top as $films){
    $tab = explode(" ",$films["im:releaseDate"]["attributes"]["label"]);
    array_push($tabFilm,$tab[2]);
    if($tab[2] < 2000){
        $date++;
    }
}
echo "il y as ".$date." films sortie avant 2000<br>";
echo "<br>";

//Quel est le film le plus récent ? Le plus vieux ?
echo "Quel est le film le plus récent ? Le plus vieux ?<br><br>";
$sorties =[];
$sortieFilm =[];
foreach($top as $films){
    $sortie = explode(" ",$films["im:releaseDate"]["attributes"]["label"]);
    $sortieFilm[] = intval($sortie[2]);
    $sorties[] = $films["im:releaseDate"]["attributes"]["label"];
}
foreach ($top as $films){
    if(max($sorties) === $films["im:releaseDate"]["attributes"]["label"]){
        echo "le film le plus recent est sortie le : ".max($sortieFilm)." ".$films["im:name"]["label"]."<br>";
    }
    if(min($sorties) === $films["im:releaseDate"]["attributes"]["label"]){
        echo "le film le plus vieux est sortie le : ".min($sortieFilm)." ".$films["im:name"]["label"]."<br>";
    }
}
echo "<br>";

//Quelle est la catégorie de films la plus représentée ?
echo "Quelle est la catégorie de films la plus représentée ?<br><br>";


echo "<br>";

//Quel est le réalisateur le plus présent dans le top100 ?
echo "Quel est le réalisateur le plus présent dans le top100 ?<br><br>";
echo "<br>";

//Combien cela coûterait-il d'acheter le top10 sur iTunes ? de le louer ?
echo "Combien cela coûterait-il d'acheter le top10 sur iTunes ? de le louer ?<br><br>";
echo "<br>";

//Quel est le mois ayant vu le plus de sorties au cinéma ?
echo "Quel est le mois ayant vu le plus de sorties au cinéma ?<br><br>";
echo "<br>";

//Quels sont les 10 meilleurs films à voir en ayant un budget limité ?
echo "Quels sont les 10 meilleurs films à voir en ayant un budget limité ?<br><br>";
