<?php 
session_start();

if (!empty($_SESSION)) {
    
    session_destroy();
    header("Location: ../../index.php?success= Vous etes bien deconnecter");
}

