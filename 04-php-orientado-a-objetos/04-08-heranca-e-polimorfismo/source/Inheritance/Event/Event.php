<?php

namespace Source\Inheritance\Event;

class Event
{
    private $event;
    private $date;
    private $price;

    private $register;
    protected $vacancies;

    /**
     * Undocumented function
     *
     * @param [type] $event
     * @param \DateTime $date
     * @param [type] $price
     * @param [type] $vacancies
     */
    public function __construct($event, \DateTime $date, $price, $vacancies)
    {
        $this->event = $event;
        $this->date = $date;
        $this->price = $price;
        $this->vacancies = $vacancies;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function getDate()
    {
        return $this->date->format("d/m/Y H:i");
    }

    public function getPrice()
    {
        return \number_format($this->price, 2, ",", ".");
    }

    public function register($fullName, $email)
    {
        if ($this->vacancies >= 1) {
            $this->vacancies -= 1;
            $this->setRegister($fullName, $email);
            echo "<p class='trigger accept'>Parabéns {$fullName}, vaga garantida!</p>";
        } else {
            echo "<p class='trigger error'>Desculpe {$fullName}, mas as vagas esgotaram!</p>";
        }
    }

    protected function setRegister($fullName, $email)
    {
        $this->register = [
            "name" => $fullName,
            "email" => $email
        ];
    }
}