<?php include "../partials/header.php"?>

<?php 

    $id = $_GET['IdVoyage'];

    $Manager = new Manager($connexion);

   $destination = $Manager->GetDestinationById($id);

   $idtourOperator = $destination->getTour_operator_id();
   $tourOperator = $Manager->getTourOperatorByDestination($idtourOperator);


   
   $score = $Manager->getscoreByTourOperatorId($idtourOperator);
      
?>



<link rel="stylesheet" href="../style/review.css">

    <section class="sectionReview">

        <h1 class="mb-5">Votre voyage à <?=$destination->getLocation()?></h1>

        <!-- CAROUSSEL POR LE LIEUX DU VOYAGE  -->

        <section>

            <div class="d-flex">
                <div id="carouselExampleDark" class="carousel carousel-light slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                        <img src="../images/images/destination/<?=$destination->getLocation()?>.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5> <?=$destination->getLocation()?></h5>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                        <img src="../images/images/destination/<?=$destination->getLocation()?>1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?=$destination->getLocation()?></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="../images/images/destination/<?=$destination->getLocation()?>2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5> <?=$destination->getLocation()?></h5>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
                <?php if ($destination->getLocation() == "Paris") {
                   ?> 
                   <iframe class="mx-5" style="width:40%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.77824581732!2d2.264634983211018!3d48.85893843456516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1709732358089!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <?php }elseif ($destination->getLocation() == "Tunis") {
                    ?> 
                    <iframe class="mx-5" style="width:40%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102239.41060651264!2d10.06087708450401!3d36.794991999313865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd337f5e7ef543%3A0xd671924e714a0275!2sTunis%2C%20Tunisie!5e0!3m2!1sfr!2sfr!4v1709732692857!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <?php }elseif ($destination->getLocation() == "Rome") {
                    ?> 
                    <iframe class="mx-5" style="width:40%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d190028.35442669416!2d12.37119158156932!3d41.91020879182387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f6196f9928ebb%3A0xb90f770693656e38!2sRome%2C%20Ville%20m%C3%A9tropolitaine%20de%20Rome%20Capitale%2C%20Italie!5e0!3m2!1sfr!2sfr!4v1709732886813!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              
                <?php }elseif ($destination->getLocation() == "Monaco") {
                    ?>
                    <iframe class="mx-5" style="width:40%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23061.476023471212!2d7.405252910267411!3d43.737880557297224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cdc26f7b3f8531%3A0x74f7784c3ac49cfc!2sMonaco!5e0!3m2!1sfr!2sfr!4v1709733071394!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <?php }elseif ($destination->getLocation() == "Londres") {
                    ?> 
                    <iframe class="mx-5" style="width:40%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.83988662003!2d-0.2664031942424631!3d51.528739805060155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondres%2C%20Royaume-Uni!5e0!3m2!1sfr!2sfr!4v1709733097039!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <?php } ?>

                    
            </div>
                
                
                <div class="text-white mb-5" style="background-color: rgba(0, 0, 0, 0.5); width:58%">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui delectus vero dolor exercitationem quo itaque obcaecati voluptates in pariatur eum! Dolore temporibus ex suscipit rem obcaecati ducimus dolorum non beatae?
                    Nemo, accusamus unde delectus maxime, modi quam dolorum impedit temporibus asperiores nulla quaerat nisi repellendus deleniti! Reprehenderit modi repellendus autem sunt ipsum aliquam, fuga rerum quae et cumque laudantium iure.
                    Deleniti unde eos pariatur quia magni voluptate fugiat laudantium impedit tenetur vitae ullam praesentium asperiores, esse quae quo quidem rem culpa ad eveniet fugit explicabo odit perferendis mollitia. Dolorum, tempore.
                    Nemo, sit reprehenderit ipsa culpa voluptates quidem molestiae error consectetur est, fugit dolor! Eligendi, iusto debitis porro illum ad dicta impedit aut asperiores sed sequi reprehenderit error rerum architecto assumenda.
                    Nesciunt recusandae cupiditate voluptates magnam nobis vel quia rem nulla voluptas error vero, quod beatae nisi sit minus! Iusto, consectetur ipsam. Velit distinctio et commodi aliquam rem tenetur facilis excepturi?
                </div>

                <div  class="text-white text-center mb-5 p-3" style="background-color: rgba(0, 0, 0, 0.5); width:58%">
                   <h2> Voyage a <?=$destination->getLocation()?> pour le prix de  <?=$destination->getPrice()?> $ avec :</h2>
                </div>
            
        </section>


        <!-- SECTION POUR LES INFO DU COMPARATEUR DE VOL  -->

        <section class="text-white mb-5 d-flex" style="background-color: rgba(0, 0, 0, 0.5); width:58%">
           
           <?php
                if ($tourOperator[0]->getCertificate() == true) {
                    ?> <img src="../images/images/certif.png" alt="" width="150px">
                <?php }
            ?>
            <div class="col-3">
                <a href="<?=$tourOperator[0]->getLink()?>"><img src="../images/images/Agencedevoyage/<?=$tourOperator[0]->getName()?>.jpeg" alt="" width="150px"></a>
            </div>  
            <div class="col-10 d-flex align-items-center">
                <h3 class="me-5"><?=$tourOperator[0]->getName()?> -- Noté <?=$score->getValue()?>/5</h3>
                <p></p>
                <a href=""><button class="btn btn-outline-light">Voir le tour operateur</button></a>
            </div>
        
        </section>
 
</section>


<?php include "../partials/footer.php"?>

