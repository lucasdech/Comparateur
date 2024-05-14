<?php

require '../../setting/db.php';
require_once '../../setting/autoLoader.php';



if (!empty($_POST['chat'])) {
    
    $manager = new Manager($connexion);
    
    $idUserByName = $manager->getIdUserbyName($_SESSION['pseudo']);
        
    $commentaires = $manager->NewComment($idUserByName['id']);

    header("Location: ../../../pages/agenceList.php?success= Commentaire bien ajouté ! Merci.");
} else {
    
    header("Location: ../../../pages/agenceList.php?error= Echec lors de l'ajout d'un comentaire, merci de reessayer .");
}
