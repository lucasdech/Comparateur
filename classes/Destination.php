<?php


class Destination{

    private int $id;
    private string $location;
    private $price;
    private int $tour_operator_id;
    private array $tour_operators = [];



    // METHODE


    public function __construct(array $destination)
    {      
        $this->hydrate($destination);       
    }

    public function hydrate(array $destination)
    {
        foreach ($destination as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $method;
    }


    // GETTER

    public function getId()
    {
        return $this->id;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTour_operator_id()
    {
        return $this->tour_operator_id;
    }

    public function getTour_operators()
    {
        return $this->tour_operators;
    }

    // SETTER

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setTour_operator_id($tour_operator_id)
    {
        $this->tour_operator_id = $tour_operator_id;
    }

    public function setTour_operators($tour_operators)
    {
        $this->tour_operators = $tour_operators;
    }

    // autre methodes pour l'objet !

    public function pushOperatorInArray(TourOperateur $tourOperateur)
    {
        array_push($this->tour_operators, $tourOperateur);
    }

    public function CountTourOperateur()
    {
        return count($this->tour_operators);
    }

}