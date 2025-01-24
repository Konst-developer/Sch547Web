<?php

abstract class Human
{
    public $age;
    public $name;
    private $passportNo;
    final public function eat()
    {
        echo "Я ем...<br>";
    }
    abstract public function work();

    public function setPassportNo($no)
    {
        $this->passportNo = $no;
    }
    public function getPassportNo()
    {
        return $this->passportNo;
    }
}
// $man = new Human;
// $man->eat();
// $man->work();

// $man->age = 14;
// $man->name = 'Иван';
// $man->setPassportNo('40251213456');

// echo $man->age . "<br>";
// echo $man->name . "<br>";
// echo $man->getPassportNo() . "<br><br>";

class Programmer extends Human
{
    public $lang;
    public function work()
    {
        echo "Программирую...<br>";
    }
}

$programmer = new Programmer;
$programmer->name = 'Иван';
$programmer->age = 10;
$programmer->setPassportNo('4025123456');
$programmer->lang = 'PHP';
var_dump($programmer);

$programmer->eat();
$programmer->work();