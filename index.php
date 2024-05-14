<?php include "./partials/header.php";

 $Manager = new Manager($connexion);
 
    $destinations = $Manager->LoadAllDestination();

    $locations = [];

    foreach ($destinations as $key) {

        if (!in_array($key->getLocation(), $locations)) {
            
            array_push($locations, $key->getLocation());
        }
        
    }

?>

<!-- LIEN VERS LA FEIULLE DE STYLE -->

<link rel="stylesheet" href="style/index.css">


    <?php 

        foreach ($locations as $location) {

            ?>
                <section class="destination text-white d-flex align-items-center justify-content-around col-12" style="background-image: url(./images/images/destination/<?=$location?>.jpg);">
                    <div class="col-3 d-flex justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.5);">
                        <p class="fs-1"><?=$location?></p>
                    </div>   
                    <div class="col-5"> 
                        <a href="./pages/details.php?Destination=<?=$location?>"><button class="btn btn-outline-light m-3">Voir les offres<i class="fa-solid fa-angles-right ms-3" style="color: #ffffff;"></i></button></a> 
                    </div>
                </section>

       <?php }  ?>




<?php include "./partials/footer.php"?>

