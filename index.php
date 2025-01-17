<?php //начало блока с PHP-кодом
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); //отключаем предупреждения и советы
echo "<h1>Hello World!!!</h1><br>"; //команда echo выводит на страницу текст. Этот текст может содержать html-теги.
$a = 5; //создаем переменную а и присваиваем ей значение 5. ВСЕ переменные в PHP начинаются со знака $
$b = 12; //создаем переменную b и присваиваем ей значение 12
$c = $a + $b; //в переменную c помещаем значение, равное сумме значений переменной a и b
echo "Сумма a и b равна " . $c . "<br>"; //символ "." объединяет строки. <br> используется для начала новой строки.
for ($i = 1; $i < 11; $i++) //цикл for. переменная i последовательно принимает значения от 1 до 10
    echo "<h1>Строка № " . $i . "</h1>"; //для каждого знанчения переменной i выводим на экран текст в форме заголовка h1

$a = 5;
$b = "7fjsdkfjahksdf";
$a += $b;  // $a=$a+$b  к переменной a прибавили значение переменной b. Получилось 12, не смотря на то, что в переменной b содержится текст
echo "a=" . $a . "<br>"; //вывели на страницу значение переменной a (12)

$a = 0;
echo "a=" . $a++ . "<br>"; //Выведет 0, т.к. постинкремент сработает босле использования переменной. После вывода на экран переменная a увеличится на 1
echo "a=" . ++$a . "<br>"; //Выведелт 2 т.к. после прошлой операции а бала равна 1, но до вывода на страницу сработает прединкремент
echo "a=" . $a-- . "<br>"; //Выведет 2
echo "a=" . --$a . "<br>"; //Выведет 0
echo "<br><br>";

$a = 5;
$b = "05";
var_dump((int)"Hello World!!!" === (int)0); //истина. т.к. принудительно преобразовав строку, не содержащую цифр в целое число, мы получили 0. 0=0 и по значению и по типу

echo "<br><br>";

$x = 100; //присваиваем значения переменным x и y
$y = 21;

if ($x > $y) { //если x больше y
    echo "x>y"; //вывести x>y
} else { //иначе
    echo "x<=y"; //вывести x<=y
}

echo "<br><br>";

//если x больше y,  закрываем php и выводим обычный html блок
if ($x > $y): ?>

    <h1>x &gt; y</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum omnis maxime perferendis magnam facilis nam
        voluptate nulla reiciendis! Ratione mollitia consequuntur enim provident odio quasi officiis. Deleniti ut voluptate
        quo quam id. Laudantium unde tempore repellendus, consequuntur, quisquam odio distinctio nesciunt recusandae
        voluptatibus quod pariatur rerum quibusdam illum ut vero. Odio et ullam maiores tempora placeat, atque eaque fuga
        nesciunt! Rerum voluptate veritatis nobis enim odio doloribus molestiae eius debitis totam, expedita quo illo nulla
        fugiat laboriosam odit iusto quaerat atque et velit autem incidunt. Cupiditate facere eaque error ipsam consectetur
        similique aliquam obcaecati veniam reiciendis consequuntur eligendi, saepe ducimus?</p>

<?php //заново открываем php. 
else: //иначе ... закрываем php и выводим другой html блок
?>

    <h1>x &lt;= y</h1>
    <p> Dolorem, aspernatur fugit doloremque iusto sapiente in fugiat cumque labore sequi blanditiis eveniet amet
        dignissimos obcaecati autem fuga odio similique, nam architecto voluptatem. Tempore iste cumque deserunt quisquam!
    </p>

<?php endif; //открываем php и указываем, что оператор if закончился. То, что мы сделали выше применяется, когда нужно вывести достаточно большой тот или иной блок 
//html-документа в зависимости от условия.
echo "<br><br>";

function compare($x, $y) //описываем функцию compare, которая принимает на вход 2 числа, сравнивает их и выводит на экран результат
{
    if ($x > $y)
        echo "x &gt; y <br>";
    else if ($x < $y)
        echo "x &lt; y <br>";
    else
        echo "x = y <br>";
}
compare(10, 20); //три раза вызываем написанную выше функцию compare для разных пар чисел
compare(20, 10);
compare(20, 20);

function average($n1, $n2) //описываем функцию average, которое находит среднее арифметическое значение двух чисел.
{
    return ($n1 + $n2) / 2; //функция возвращает вычисленное значение
}

echo average(5, 7) . "<br>"; //несколько раз вызываем функцию average с разными парами чисел и выводим результат на страницу
echo average(10, 20) . "<br>";
echo average(1, 9) . "<br>";

$arr = [2, 5, 'Яблоко', 'Комьютер', 2.25]; //создаем массив arr и заполняем его значениями через запятую
echo $arr[3] . "<br>"; // выводим 3-й элемент массива. Выведет "Компьютер". Объясните, почему?

for ($i = 0; $i < count($arr); $i++) //с помощью цикла for выводим все элементы массива с их индексами. Функция count возвращает количество элементов массива
    echo $i . ": " . $arr[$i] . ", ";
echo "<br>";

$arr[] = "Монитор"; // добавили в массив 6-й элемент
$arr[10] = "Принтер"; //добавили в массив 7-й элемент, но с индексом 10

foreach ($arr as $value) //еще один цикл, позволяющий перебрать все элементы массива
    echo $value . ", ";
echo "<br>";

array_push($arr, "Арбуз", "Клавиатура"); //добавили в массив еще два элемента. Их теперь 9

foreach ($arr as $key => $value) //перебираем в цикле все ключи и значения. Обратите внимание, что ключей 6,7,8,и 9 нет.
    echo $key . ": " . $value . ", ";
echo "<br>";

unset($arr[11]); //удалаяем из массива элемент с индексом 11 (Арбуз)

var_dump($arr); //данная функция выводит на страницу информацию о переменной, в данном случае о массиве. Применяется исключительно для отладки кода т.к. выдает служебную информацию
echo "<br>";

for ($i = 0; $i < count($arr); $i++) //пытаемся вывести все элементы массива с помощью цикла for, но не получается это сделать. Почему?
    echo $i . ": " . $arr[$i] . ", ";
echo "<br>";
?>

<ol>
    <?php //применение цикла для создания списка на веб-странице
    foreach ($arr as $value)
        echo "<li>" . $value . "</li>"
    ?>
</ol>

<select name="" id="">
    <?php //применение цикла для создания выпадающего списка на веб-странице
    foreach ($arr as $value)
        echo "<option>" . $value . "</option>"
    ?>
</select>