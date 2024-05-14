<?php


class Score{

    private int $id;
    private int $value;
    private string $author;



    // METHODE


    public function __construct(array $score)
    {
        $this->hydrate($score);
    }

    public function hydrate(array $score)
    {
        foreach ($score as $key => $value) {
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

    public function getValue()
    {
        return $this->value;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    // SETTER 

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }
}