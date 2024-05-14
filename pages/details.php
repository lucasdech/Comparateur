<?php include "../partials/header.php"?>

<?php

    $DestinationName = $_GET['Destination'];

    $manager = new Manager($connexion);
    $destinationByOperator = $manager->DestinationByCompanie($DestinationName);

?>

<!-- LIEN VERS LA FEIULLE DE STYLE DE LA PAGE  -->

<link rel="stylesheet" href="../style/details.css">


<?php 

foreach ($destinationByOperator as $destination) {

    $TourOperator = $destination->getTour_operators();

    ?>   
        <section class="affichage d-flex align-items-center justify-content-around col-12 mt-5" style="background-image: url(../images/images/destination/<?=$destination->getLocation()?>.jpg);">
            
            <div class="col-6 d-flex justify-content-center align-items-center text-white" style="background-color: rgba(0, 0, 0, 0.5);">
                <p class="fs-1">Partez à <?=$destination->getLocation()?>
                    pour  <?=$destination->getprice()?>$</p>
            </div>
            <a href="../pages/review.php?IdVoyage=<?=$destination->getId()?>"><button class="btn btn-light">Voir le details</button></a>

           <?php  
                foreach ($destinationByOperator as $key) {

                    $test = $key->getTour_operators();

                        foreach ($test as $key1) {

                            $tourOperatorId = $destination->getTour_operator_id();

                              if ($key1->getIdTO() == $tourOperatorId) {
                                ?> 
                                
                                <div class="text-center">
                                    <a href="<?=$key1->getLink()?>"><img src="../images/images/Agencedevoyage/<?=$key1->getName()?>.jpeg" height="150px" alt=""></a>
                                    <div class="text-white fs-3">Partez avec :<?=$key1->getName()?> </div>
                                </div>

                                <?php
                              }
                        }
                    }
                ?>
        </section>

<?php } ?>
