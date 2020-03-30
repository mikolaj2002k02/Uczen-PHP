<?php
function wczytaj($zmienna)
{
           if (!isset($_GET[$zmienna]) || $_GET[$zmienna]=="")
                die("Brak Zmiennej: ".$zmienna); // nie podano marki w $
           return $_GET[$zmienna];
}

$baza = new  mysqli("localhost", "root", "", "uczen");
if (mysqli_connect_errno())  die( "Blad: ".mysqli_connect_error() );
$baza->set_charset("utf8");
?>