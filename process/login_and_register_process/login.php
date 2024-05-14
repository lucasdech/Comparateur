<?php

// PAGE POUR SE CONNECTER UNE FOIS ENREGISTRER

session_start();


if (!empty($_POST['Username']) && !empty($_POST['Password'])) {

    require_once '../../setting/db.php';

    $preparedRequest = $connexion->prepare("SELECT * FROM author WHERE UserName = ? ");
    $preparedRequest->execute([
        $_POST['Username']
    ]);
    $user = $preparedRequest->fetch(PDO::FETCH_ASSOC);

    $inputPassword = $_POST['Password'];
    $hash = $user['passWord'];
    
    $isverified = password_verify($inputPassword, $hash);
    if ($isverified) {
        
         $_SESSION['pseudo'] = $user["UserName"];
        
         header('Location: ../../index.php?success= Bonjour ' . $_SESSION['pseudo'] . " " .' !');
            exit();
        } else {
            header('Location: ../../index.php?error=Mot de passe incorrect!');
            exit();
        }
    } else {
        header('Location: ../../index.php?error=Adresse mail ou pseudo inexistant!');
        exit();
    }
