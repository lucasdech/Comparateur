<?php


class Manager
{

  private $connexion;


  public function __construct($connexion)
  {
    $this->connexion = $connexion;
  }

  // autre methodes a trier par methodes par classes 

  public function LoadAllDestination()
  {
    $prepareSQL = $this->connexion->prepare('SELECT * FROM destination');
    $prepareSQL->execute();

    $listDestinations = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

    $destinationArray = [];

    foreach ($listDestinations as $key) {

      $destination = new Destination($key);

      if (in_array($destination->getLocation(), $destinationArray) == false) {

        array_push($destinationArray, $destination);
      }
    }

    return $destinationArray;
  }

  public function GetDestinationByTo($id)
  {
    $prepareSQL = $this->connexion->prepare('SELECT destination WHERE destination.tour_operator_id = ?');
    $prepareSQL->execute([$id]);

    $destinationById = $prepareSQL->fetch(PDO::FETCH_ASSOC);

    return $destinationById;
  }

  public function DestinationByCompanie(string $destination)
  {
    $prepareSQL = $this->connexion->prepare(
      'SELECT * FROM destination 
                                                  LEFT JOIN tour_operator 
                                                ON destination.tour_operator_id = tour_operator.idTO 
                                                 WHERE destination.location = ?'
    );

    $prepareSQL->execute([$destination]);

    $destinations = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

    $destinationArray = [];

    foreach ($destinations as $key) {

      $destinationObject = new Destination($key);
      $OperatorObject = new TourOperateur($key);

      $destinationObject->pushOperatorInArray($OperatorObject);

      array_push($destinationArray, $destinationObject);
    }

    return $destinationArray;
  }



  public function getAllTourOperator()
  {
    $prepareSQL = $this->connexion->prepare('SELECT * FROM tour_operator');
    $prepareSQL->execute();

    $lisTour_Operator = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

    $ArrayTour_operator = [];

    foreach ($lisTour_Operator as $key) {

      $tourOperator = new TourOperateur($key);
      array_push($ArrayTour_operator, $tourOperator);
    }

    return $ArrayTour_operator;
  }



  public function getALLTourOperatorWithReview()
  {
    $prepareSQL = $this->connexion->prepare('SELECT * FROM tour_operator 
                                                    JOIN review 
                                                      ON review.tour_operator_id = tour_operator.idTO 
                                                    JOIN author 
                                                      ON author.id = review.author_id');
    $prepareSQL->execute();

    $TourOperator = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

    $TourOperatorArray = [];

    foreach ($TourOperator as $key) {

      $TO = new TourOperateur($key);
      $review = new Review($key);

      $TO->pushReviewInArray($review);
      array_push($TourOperatorArray, $TO);
    }
    return $TourOperatorArray;
  }



  public function GetDestinationById(int $id)
  {
    $prepareSQL = $this->connexion->prepare('SELECT * FROM destination WHERE destination.id = ?');
    $prepareSQL->execute([$id]);

    $destination = $prepareSQL->fetch(PDO::FETCH_ASSOC);

    $destinationObject = new Destination($destination);

    return $destinationObject;
  }



  public function getTourOperatorByDestination($id)
  {
    $prepareSQL = $this->connexion->prepare('SELECT * FROM destination
                                                  JOIN tour_operator 
                                                ON destination.tour_operator_id = tour_operator.idTO 
                                                  WHERE destination.tour_operator_id = ? 
                                                ');
    $prepareSQL->execute([$id]);

    $tourOperator = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

    $array = [];

    foreach ($tourOperator as $key) {

      $tourOperatorObject = new TourOperateur($key);
      array_push($array, $tourOperatorObject);
    }

    return $array;
  }



  public function getscoreByTourOperatorId($id)
  {
    $prepareSQL = $this->connexion->prepare('SELECT * FROM score WHERE tour_operator_id = ?');
    $prepareSQL->execute([$id]);


    $score = $prepareSQL->fetch(PDO::FETCH_ASSOC);

    $objectScore = new Score($score);

    return $objectScore;
  }



  public function ChangePrice($idTO, $nameOfLocation, $price)
  {
    $prepareSQL = $this->connexion->prepare('UPDATE destination SET price = ? WHERE tour_operator_id = ? AND location = ?');
    $prepareSQL->execute([
      $price,
      $idTO,
      $nameOfLocation
    ]);
  }


  public function getIdUserbyName(string $pseudo)
  {
    $prepareSQL = $this->connexion->prepare('SELECT id FROM author WHERE UserName = ?');
    $prepareSQL->execute([$pseudo]);

    $author = $prepareSQL->fetch(PDO::FETCH_ASSOC);

    return $author;
  }


  public function NewComment(int $id)
  {
    $prepareSQL = $this->connexion->prepare("INSERT INTO review(message, tour_operator_id, author_id) VALUES (?,?,?)");
    $prepareSQL->execute([
      $_POST['chat'],
      $_GET['tour_operator_id'],
      $id,
    ]);
  }

  public function InsertNewDestination()
  {
    $prepareSQL = $this->connexion->prepare('INSERT INTO destination (location, price, tour_operator_id) VALUES (?,?,?)');
    $prepareSQL->execute([
      $_POST["name"],
      $_POST["price"],
      $_POST["TourOperator"],
    ]);
  }

  public function InsertNewTO()
  {
    $prepareSQL = $this->connexion->prepare('INSERT INTO tour_operator(name, link) VALUES (?,?)');
    $prepareSQL->execute([
      $_POST["name"],
      $_POST["link"],
    ]);
  }
}
