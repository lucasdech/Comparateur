<?php include "../partials/header.php"?>

<?php 

    $manager = new Manager($connexion);
    $TourOperatorList= $manager->getAllTourOperator();

    // $GetDestinationByTo = $manager->GetDestinationByTo($id);


    $prepareSQL = $connexion->prepare("SELECT * FROM destination JOIN tour_operator ON tour_operator.idTO = destination.tour_operator_id");
    $prepareSQL->execute();
    $DestinationList = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);
       
?>

<link rel="stylesheet" href="../style/admin.css">
<!-- FORMULAIRE POUR AJOUTER LES TOUR OPERATOR -->


<section class="container" style="margin-left:20%; margin-top: 7%;">

    <div class="container">
        <h1>Ajouter un Tour Operateur</h1>
    <form action="../process/admin/add_tourOperator.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Tour Operator Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameTip">
                <div id="nameTip" class="form-text">Please enter the name of the new Tour Operator.</div>
            </div>
        
            <div class="mb-3">
                <label for="link" class="form-label">Tour Operator Link</label>
                <input type="text" class="form-control" name="link" id="link" aria-describedby="linkTip">
                <div id="linkTip" class="form-text">Please enter the link of the new Tour Operator.</div>
            </div>
        
            <button type="submit" class="button-23">Submit</button>
    </form>
    </div>

    <!-- FORMULAIRE POUR AJOUTER LES VOYAGES -->


    <div class="container mt-5">
        <h1>Ajouter un voyage</h1>
            <form action="../process/admin/add_destination.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Add Place</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameTip">
                    <div id="nameTip" class="form-text">Please enter the name of the new Destination.</div>
                </div>
                
                <!-- input de type number pour le prix du voyage  -->

                <input type="number" name="price" placeholder="addPrice $">

            
                <!-- select avec les options dans un foreach pour les tour Operator -->

                <select name="TourOperator" id="TourOperateur-select">

                            <?php foreach ($TourOperatorList as $key) {
                                    ?>
                                    <option name="Operator" value="<?=$key->getIdTO()?>"><?=$key->getName()?></option>    
                            <?php } ?>                
                </select> 
                    
                    <button type="submit" class="button-23">Submit</button>
            </form>
    </div>


            <!-- FORMULAIRE POUR MODIFIER UN VOYAGE  -->

    <div class="mt-5">

        <h1>Modifier un Voyage</h1>

            <form action="../process/admin/changePrice.php" method="post" class="mt-6">

                <select name="select" id="TourOperateur-select">

                    <?php foreach ($TourOperatorList as $key) {
                        ?>
                        <option name="name&operator" value="<?=$key->getName()?>"><?=$key->getName()?></option> 
                    <?php } ?>   

                </select> 
                         
                <div class="mb-3">
                    <label for="name" class="form-label">Tour Operator Name</label>
                    <input type="number" class="form-control" name="price" id="name" aria-describedby="nameTip">
                    <div id="nameTip" class="form-text">Please enter the new Price.</div>
                </div>

                <button type="submit" class="button-23">Submit</button>

            </form>

    </div>


</section>




<?php include "../partials/footer.php"?>