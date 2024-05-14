<?php 

require_once '../../setting/db.php';
require_once '../../setting/autoLoader.php';


if (!empty($_POST['name'])) {

    $manager = new Manager($connexion);
    $createDestination = $manager->InsertNewDestination();

    header("Location: ../../index.php?success= Tour operator ajouter avec succes");
}else {
    header("Location: ../../pages/admin.php?error= Tour operator ajouter avec succes");
    
}