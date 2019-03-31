<?php

class Word
{

    private $id;
    private $word;
    private $meaning;
    private $createdDate;
    private $numberCorrect;

    public function __construct()
    {

    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setWord($word)
    {
        $this->word = $word;
    }

    public function getWord()
    {
        return $this->word;
    }

    public function setMeaning($meaning)
    {
        $this->meaning = $meaning;
    }

    public function getMeaning()
    {
        return $this->meaning;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function setNumberCorrect($numberCorrect)
    {
        $this->numberCorrect = $numberCorrect;
    }

    public function getNumberCorrect()
    {
        return $this->numberCorrect;
    }
}
