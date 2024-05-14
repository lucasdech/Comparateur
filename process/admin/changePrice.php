<?php require_once "../../setting/db.php";

    var_dump($_POST);

    if (!empty($_POST['select']) && !empty($_POST['price'])) {
        
        
            $manager = new Manager($connexion);
            
            $changeprice = $manager->ChangePrice($_POST['select'], $_POST['location'], $_POST['price']);
    }
