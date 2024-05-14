<?php


class TourOperateur{

    private int $idTO;
    private string $name;
    private string $link;
    private bool $certificate = false;
    private string $destinations;
    private array $reviews = [];
    private int $scores;



    // METHODE


    public function __construct(array $touroperateur)
    {
        $this->hydrate($touroperateur);
    }

    public function hydrate(array $touroperateur)
    {
        foreach ($touroperateur as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $method;
    }


    // GETTER

    public function getIdTO()
    {
        return $this->idTO;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLink()
    {
        return $this->link;
    }
    
    public function getCertificate()
    {
        return $this->certificate;
    }
    
    public function getDestinations()
    {
        return $this->destinations;
    }
    
    public function getReview()
    {
        return $this->reviews;
    }

    public function getScores()
    {
        return $this->scores;
    }

    // SETTER

    public function setIdTO($idTO)
    {
        $this->idTO = $idTO;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
    }

    public function setDestinations($destinations)
    {
        $this->destinations = $destinations;
    }

    public function setReview($reviews)
    {
        $this->reviews = $reviews;
    }
    
    public function setScores($scores)
    {
        $this->scores = $scores;
    }


    public function pushReviewInArray(Review $review)
    {
        array_push($this->reviews, $review);
    }

}