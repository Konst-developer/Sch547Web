<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
echo "<h1>Hello World!!!</h1><br>";
$a = 5;
$b = 12;
$c = $a + $b;
echo "Сумма a и b равна " . $c . "<br>";
for ($i = 1; $i < 11; $i++)
    echo "<h1>Строка № " . $i . "</h1>";

$a = 5;
$b = "7fjsdkfjahksdf";
$a += $b;  // $a=$a+$b
echo "a=" . $a . "<br>";

$a = 0;
echo "a=" . $a++ . "<br>"; //0
echo "a=" . ++$a . "<br>"; //2
echo "a=" . $a-- . "<br>"; //2
echo "a=" . --$a . "<br>"; //0
echo "<br><br>";

$a = 5;
$b = "05";
var_dump((int)"Hello World!!!" === (int)0);

echo "<br><br>";

$x = 100;
$y = 21;

if ($x > $y) {
    echo "x>y";
} else {
    echo "x<=y";
}

echo "<br><br>";

if ($x > $y): ?>

<h1>x &gt; y</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum omnis maxime perferendis magnam facilis nam
    voluptate nulla reiciendis! Ratione mollitia consequuntur enim provident odio quasi officiis. Deleniti ut voluptate
    quo quam id. Laudantium unde tempore repellendus, consequuntur, quisquam odio distinctio nesciunt recusandae
    voluptatibus quod pariatur rerum quibusdam illum ut vero. Odio et ullam maiores tempora placeat, atque eaque fuga
    nesciunt! Rerum voluptate veritatis nobis enim odio doloribus molestiae eius debitis totam, expedita quo illo nulla
    fugiat laboriosam odit iusto quaerat atque et velit autem incidunt. Cupiditate facere eaque error ipsam consectetur
    similique aliquam obcaecati veniam reiciendis consequuntur eligendi, saepe ducimus?</p>

<?php
else: ?>

<h1>x &lt;= y</h1>
<p> Dolorem, aspernatur fugit doloremque iusto sapiente in fugiat cumque labore sequi blanditiis eveniet amet
    dignissimos obcaecati autem fuga odio similique, nam architecto voluptatem. Tempore iste cumque deserunt quisquam!
</p>

<?php endif;

echo "<br><br>";

function compare($x, $y)
{
    if ($x > $y)
        echo "x &gt; y <br>";
    else if ($x < $y)
        echo "x &lt; y <br>";
    else
        echo "x = y <br>";
}
compare(10, 20);
compare(20, 10);
compare(20, 20);

function average($n1, $n2)
{
    return ($n1 + $n2) / 2;
}

echo average(5, 7) . "<br>";
echo average(10, 20) . "<br>";
echo average(1, 9) . "<br>";

$arr = [2, 5, 'Яблоко', 'Комьютер', 2.25];
echo $arr[3] . "<br>";

for ($i = 0; $i < count($arr); $i++)
    echo $i . ": " . $arr[$i] . ", ";
echo "<br>";

$arr[] = "Монитор";
$arr[10] = "Принтер";

foreach ($arr as $value)
    echo $value . ", ";
echo "<br>";

array_push($arr, "Арбуз", "Клавиатура");

foreach ($arr as $key => $value)
    echo $key . ": " . $value . ", ";
echo "<br>";

unset($arr[11]);

var_dump($arr);
echo "<br>";

for ($i = 0; $i < count($arr); $i++)
    echo $i . ": " . $arr[$i] . ", ";
echo "<br>";
?>

<ol>
    <?php
    foreach ($arr as $value)
        echo "<li>" . $value . "</li>"
    ?>
</ol>

<select name="" id="">
    <?php
    foreach ($arr as $value)
        echo "<option>" . $value . "</option>"
    ?>
</select>