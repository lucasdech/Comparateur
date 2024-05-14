<?php 

require_once '../../setting/db.php';


$preparedRequestCreateDestination = $connexion->prepare(
    "SELECT * FROM destination "
);
$preparedRequestCreateDestination->execute();

// fetch pdo assoc dans une variable 

 $reponse = $preparedRequestCreateDestination->fetchAll(PDO::FETCH_ASSOC);


// var dump
