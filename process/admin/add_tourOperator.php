<?php 

require_once '../../setting/db.php';
require_once '../../setting/autoLoader.php';


if (!empty($_POST['name']) && !empty($_POST['link'])){
    
    $manager = new Manager($connexion);
    $CreateTourOperator = $manager->InsertNewTO();
   

    header("Location: ../../pages/admin.php?success= Tour operator ajouter avec succes");

}else {

    header("Location: ../../pages/admin.php?error= Tour operator ajouter avec succes");
}