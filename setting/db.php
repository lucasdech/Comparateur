<?php

try
{
     
$connexion = new PDO('mysql:host=127.0.0.1;dbname=ComparateurVol;charset=utf8','root','', 
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $message){
     echo "La connexion a la base de données n'est pas bonne !" ;
}
?>
