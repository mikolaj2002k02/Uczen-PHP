<html>
 <head>
  <meta charset="utf-8">
  <title>Zadanie</title>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 </head>
 <body>
  <div ng-app="myApp" ng-controller="customersCtrl">
  <select>
   <option ng-repeat="uczen in pesel track by $index" value="{{uczen.pesel}}">{{uczen.pesel}}</option>
  </select>
     </div>
 <h1>Uczen</h1><br/><br/>
     
  <table border="1">
   <tr>
       <th>pesel</th><th>imie</th><th>nazwisko</th><th>adres</th>
   </tr>
<?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM uczen ORDER BY pesel"))
{
        $sql->execute();
        $sql->bind_result($pesel, $imie, $nazwisko, $adres);
        while ($sql->fetch())
        {
                echo "<tr>
                        <td>$pesel</td>
                        <td>$imie</td>
                        <td>$nazwisko</td>
                        <td>$adres</td>
                        <td><a href=\"usun.php?pesel=$pesel\" onclick=\"javascript:return confirm('Czy na pewno usunąć?'); \">Usuń</a></td>
                   </tr>";
            
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin." );

 $baza->close();
?>
  </table>
  <a href="dodaj.php">Dodawaj</a>
<a href="wyszukiwarka.php">Wyszukaj</a>
     <script>
     var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
                $http.get("json_select.php")
                .success(
                  function(data, status, headers, config){
                        $scope.pesel=data;
                });
        });
     
     
     </script>
 </body>
</html>
