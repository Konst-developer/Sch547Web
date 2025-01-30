<?php
//создаем абстрактный класс Human
//класс абстрактный, т.к. в нем присутствует абстрактный
//метод work
abstract class Human
{
    public $age; //перечисляем публичные свойства: возраст и имя
    public $name;
    private $documentNo; //приватное, т.е. недоступное извне свойство - номер документа
    final public function eat() //публичный метод eat. Все люди едят одинаково, поэтому реализацию этого метода описываем для всех людей
    {
        echo "Я ем...<br>";
    }
    abstract public function work(); //все люди работают по-разному. Поэтому данный метод делаем абстрактным
    //реализация этого метода обязательна для всех наследников класса Human

    public function setDocumentNo($no) //сеттер - специальный метод, через который доступна установка приватного свойсва documentNo
    {
        $this->documentNo = $no;
    }
    public function getDocumentNo() //геттер - специальный метод, через который мы можем прочитать значение приватного свойства documentNo
    {
        return $this->documentNo;
    }
}

class Man extends Human
{ //класс Man-человек наследует все свойства и методы от класса Human
    public function work()
    { //поскольку в родительском классе этот метод абстрактный, здесь необходимо описать реализацию этого метода
        echo "Я копаю землю... <br>";
    }
}

$man = new Man; //создаем экземпляр класса (объект) Man
$man->eat(); //вызываем публичные методы объекта man
$man->work();

$man->age = 14; //задаем публичные свойства объекта man - возраст и имя
$man->name = 'Иван';
$man->setDocumentNo('40251213456'); //задаем приватное свойство объекта man

echo $man->age . "<br>"; //выводим на экран публичные и приватные свойства объекта man
echo $man->name . "<br>";
echo $man->getDocumentNo() . "<br><br>";

class Programmer extends Man //описываем класс Programmer, который наследует все свойства и методы от класса Man
{
    public $lang; //добавляем новое свойство, которого нет у класса Man - язык программирования
    public function work() //меняем реализацию метода work. Программист не должен копать землю, а должен программировать
    {
        echo "Программирую...<br>";
    }
}

$programmer = new Programmer; //создаем экземпляр класса Programmer
$programmer->name = 'Иван'; //задаем ему свойства
$programmer->age = 10;
$programmer->setDocumentNo('4025123456');
$programmer->lang = 'PHP';
var_dump($programmer); //выводим информацию об объекте programmer

echo "<br>";

$programmer->eat(); //вызываем методы объекта programmer
$programmer->work();
