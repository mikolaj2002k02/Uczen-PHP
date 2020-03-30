<?php
include "polacz.php";
$pesel = wczytaj("pesel");
$imie = wczytaj("imie");
$nazwisko = wczytaj("nazwisko");
$adres = wczytaj("adres");

$sql = $baza->prepare("UPDATE uczen SET imie=?, nazwisko=?, adres=? WHERE pesel=?;");
if ($sql)
{
        $sql->bind_param("isss",  $pesel, $imie, $nazwisko, $pesel);
        $sql->execute();
        $sql->close();
}
  else die("Błąd SQL: ". $baza->error);
$baza->close();
header ("Location: http://localhost/uczen/");
?>