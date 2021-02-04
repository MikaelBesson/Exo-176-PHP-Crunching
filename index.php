<?php

$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);

//Combien de mots contient ce dictionnaire ?

echo "le dictionnaire contient : ".count($dico)." mots<br>";

// Combien de mots font exactement 15 caractères ?

$i =0;
foreach ($dico as $index => $value){
    if(strlen($value) === 15){
        $i++;
    }
}
echo "il y as : ".$i." mots egal a 15 caracteres<br>";

// Combien de mots contiennent la lettre « w » ?

$contW =0;
foreach ($dico as $index => $value){
    if(strpos($value, 'w')){
        $contW++;
    }
}
echo "il y as : ".$contW." mots qui contiennent un 'W'<br>";

// Combien de mots finissent par la lettre « q » ?

$countQ = 0;
foreach ($dico as $value){
    if(strrpos($value,"q") === strlen(trim($value)) - 1){
        $countQ++;
    }
}
echo "il y as : ".$countQ." mots qui finisent par un 'Q'";





