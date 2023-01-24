<?php

$cars = array ("ferrari","audi","bmw");
$cars[4] = "toyota";
$cars[] ="mercedes";
var_dump($cars);

echo '<hr>';

$ages = array ("mario" => 32, "elena" => 27, "guido" => 29);
$ages["Pietro"] = 81;
$ages[] = "Paolo";
$ages["Maria"] = "16";
$ages[] = 9;
$ages[2] = 20;
var_dump($ages);

echo '<hr>';
$famiglia = array (
    "rossi" => array ("1","2","3"),
    "Verdi" => array ("A","B","C"),);

    $famiglia[] = "pippo";

$famiglia["gialli"] = array ("A","B","C");
$famiglia[] = 14;
$famiglia["verdi"][] = "d";
$famiglia [4][] = "elementoA";
$famiglia [4][] = "elementoB";
$famiglia[] = 15;
$famiglia[3] ="";
    var_dump ($famiglia);

    $famiglia ["verdi"] = "d";

