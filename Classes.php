<?php

class Human
{
    public $age;
    public $name;
    private $passportNo;
    public function eat()
    {
        echo "Я ем...<br>";
    }
    public function work()
    {
        echo "Копаю землю...<br>";
    }
    public function setPassportNo($no)
    {
        $this->passportNo = $no;
    }
    public function getPassportNo()
    {
        return $this->passportNo;
    }
}
$man = new Human;
$man->eat();
$man->work();

$man->age = 14;
$man->name = 'Иван';
$man->setPassportNo('40251213456');

echo $man->age . "<br>";
echo $man->name . "<br>";
echo $man->getPassportNo() . "<br>";
