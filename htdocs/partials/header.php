<?php

require __DIR__ . '/../setting/db.php';
require __DIR__ . '/../setting/autoLoader.php';
require __DIR__ . '/../setting/messages.php';
// require __DIR__ . '/../setting/debug.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lowcost travel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/style.css">
    </head>
    <body>

    <!-- nav bar du haut -->
    <header>
        <section class="NavBar d-flex align-items-center justify-content-around position fixed">
            <div>
                <a href="../index.php"><img src="../images/images/logo.png" alt="logo de l'entreprise de voyage" height="100px"></a>
            </div>
            <div>
                <?php 
                    if (!empty($_SESSION['pseudo'])) {
                        ?><p class="text-white p-2 rounded" style="background-color: rgba(0, 0, 0, 0.5);">connecter en tant que : <?=$_SESSION['pseudo']?></p>
                    <?php } ?>
            </div>
            <div>
                <h1 class="text-white">TRAVEL L<i class="fa-solid fa-earth-africa fa-xs" style="color: #ffffff;"></i>WCOST</h1>
            </div>
            <div>
                <!-- bouton qui ouvre la modal -->

            <?php 
                if (empty($_SESSION)) {
                    
                  ?>  <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#connexion">Se connecter</button>
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#createAcount">Crer un compte</button>
               <?php } else {

                  ?> 
                   <a href="../process/login_and_register_process/Deconnexion.php"><button class="btn btn-outline-light" type="button">Deconnexion</button></a>
                   <?php 
                   if ($_SESSION['pseudo'] == "admin") {
                    ?>    <a href="../pages/admin.php"><button class="btn btn-outline-light" type="button">Page Administrateur</button></a>
                

                  <?php } } ?>

            </div>
        </section>
    </header>

    <!-- DEBUT DE LA MODAL CONNEXION -->

    <div class="modal fade" id="connexion" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Connexion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../process/login_and_register_process/login.php" method="post">
                        <input type="text" class="form-control" name="Username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="password" class="form-control mt-3" name="Password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary mt-3">Se connecter</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- FIN DE LA MODAL CONNEXION -->

    <!-- DEBUT DE LA MODAL CREATE ACOUNT -->

        <div class="modal fade" id="createAcount" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Creer votre compte </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../process/login_and_register_process/add_user.php" method="post">
                        <input type="text" class="form-control" name="Username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="password" class="form-control mt-3" name="Password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary mt-3">Creation du compte</button>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    
    <!-- FIN DE LA MODAL CREATE ACOUNT -->



    <!-- début navbar de la gauche  -->

    
        <section class="Left_Nav d-flex col-12 justify-content-center text-center text-white">
            <div class="mt-5 me-2 row col-10">
                <a href="../index.php"><button class="btn btn-outline-light m-3">Acceuil</button></a>
                <i class="fa-solid fa-phone" style="color: #ffffff;"></i><p>06-25-92-32-26</p>
                <i class="fa-solid fa-at" style="color: #ffffff;"></i> <p>TravLow@voyagePasChere.com</p>
                <i class="fa-brands fa-instagram" style="color: #ffffff;"></i><p>@stepahne_supercar</p>
            </div> 
        </section>


    <!-- fin navbar de la gauche  -->

