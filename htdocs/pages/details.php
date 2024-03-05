<?php include "../partials/header.php";
 
 $DestinationName = $_GET['Destination'];


 $manager = new Manager($connexion);
 $destinationByOperator = $manager->DestinationByCompanie($DestinationName);


?>

<!-- LIEN VERS LA FEIULLE DE STYLE DE LA PAGE  -->

<link rel="stylesheet" href="../style/details.css">



<?php 

foreach ($destinationByOperator as $destination) {
        // var_dump($destination)
    ?>   
        <section class="affichage d-flex align-items-center justify-content-around col-12 mt-5" style="background-image: url(../images/images/destination/<?=$destination['location']?>.jpg);">
            <div class="text-white col-6 d-flex justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.5);">
                <p class="fs-1"><?=$destination['location']?></p>
                <p class="fs-1">prix :<?=$destination['price']?></p>
            </div>
        </section>


<?php } ?>
