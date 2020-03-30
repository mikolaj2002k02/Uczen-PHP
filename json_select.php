<?php
        header('Access-Control-Allow-Origin: *');
        include "polacz.php"; 
        if ($sql = $baza->prepare( "SELECT DISTINCT pesel FROM uczen ORDER BY pesel "))
        {
                $sql->execute();
                $sql->bind_result($pesel;
                while ($sql->fetch())
                  $pesel[] = array(
                     "pesel" => $pesel,
                   ); 
                $sql->close();
        }
        $baza->close();
        echo json_encode($pesel, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>