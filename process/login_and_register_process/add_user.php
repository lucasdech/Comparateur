<?php 

//  PAGE POUR UN ENREGISTRER UN NVL UTILISATEUR
session_start();

if (!empty($_POST['Username'])
    && !empty($_POST['Password']) ) {

        
        
        require_once '../../setting/db.php';

        $hashed_password = password_hash($_POST["Password"], PASSWORD_DEFAULT);

        $preparedRequestCreateUser = $connexion->prepare(

            "INSERT INTO author (`UserName`, `passWord`) VALUES (?,?)"

        );
        $preparedRequestCreateUser->execute([
            $_POST["Username"],
            $hashed_password,
        ]);


        header('Location: ../../index.php?success= Compte Creer avec succes !');
}else{

    header('Location: ../../index.php?error= Merci de remplir le formulaire');

}
