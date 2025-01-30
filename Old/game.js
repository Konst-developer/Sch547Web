var canv = document.getElementById('canv'); //Находим элемент с id "canv". Это элемент с тегом canvas в 
// файле game.html. Canvas - это холст, на котором происходит отрисовка всей графики в игре
canv.width = 600;  //Задаем размер canvas 600x600 пикселов
canv.height = 600;
var ctx = canv.getContext('2d'); //получаем контекст холста и сохраняем его в переменную ctx

var canv2 = document.getElementById('canv2');//Находим второй canvas
canv2.width = 600;  //Задаем размер второго canvas 600x600 пикселов
canv2.height = 600;
var ctx2 = canv2.getContext('2d');

var fc = 'rgb(0,0,50)';//цвет фона
var bc = 'rgb(255,255,150)';//цвет шарика

var state = { //Объект в котором хранится состояние игры
    x: 300, // x и y координаты мяча
    y: 300,
    dx: 1, //горизонтальная скорость
    dy: 2,  //вертикальная скорость
    cx: 300,  //координаты центра ракетки
    points: 0, //очки
    level: 1,  //уровень
    gamestart: true,  //флаг, показывающий, игра активна или на паузе
    gameover: false, // флаг, показывающий, что игра закончена
};

/*
Функция showBall рисует или стирает мяч на холсте. Если в качестве входного параметра
приходит true, то функция рисует мяч, а, если false, то мяч стирается (точнее рисуется такой-же мяч,
только цветом фона) 
*/
function showBall(vis) {
    if (vis) { // если vis истина, рисуем мяч
        ctx.fillStyle = bc; //настраиваем заливку на цвет мяча
        ctx.beginPath(); //для прорисовки сложных фигур нужно начать путь отрисовки
        ctx.arc(state.x, state.y, 25, 0, 2 * Math.PI); //рисуем круг. первые два параметра - это координаты центра круга
        //затем, 25 - радиус круга, далее начальный угол и конечный (от 0 до 2 пи - т.е целая окружность)
        ctx.fill(); //заливаем окружность
    }
    else { //если vis  ложно, стираем мяч
        ctx.fillStyle = fc; //аналогично рисуем мяч цветом фона. т.е. стираем его
        ctx.beginPath();
        ctx.arc(state.x, state.y, 26, 0, 2 * Math.PI);
        ctx.fill();
    }
}

//Данная функция рисует или стирает ракетку
function показатьРакетку(vis) {
    if (vis) { //если истина
        ctx.fillStyle = 'rgb(255,0,0)';
        ctx.fillRect(state.cx - 50, 575, 100, 25); //рисуем прямоугольник красного цвета
    }
    else { //иначе рисуем прямоугольник цвета фона (т.е. стираем ракетку)
        ctx.fillStyle = fc;
        ctx.fillRect(state.cx - 51, 574, 102, 27);
    }
}

//функция осуществляющая движение мяча
function move() {
    if (state.gamestart && !state.gameover) { //если игра начата, но не закончена
        showBall(false); //стираем мяч
        state.x += state.dx; //меняем текущие координаты мяча (прибавляем скорости по оси x и оси y)
        state.y += state.dy;
        showBall(true); //рисуем мяч по новым координатам
        if (state.x > 574 || state.x < 25) state.dx = -state.dx; //если мяч коснулся правой или левой границы
        //меняем знак горизонтальной скорости
        if (state.y < 25) state.dy = -state.dy; // тоже самое для верхней границы
        if (state.y >= 549 && state.x >= state.cx - 50 && state.x <= state.cx + 50) {//если мяч коснулся ракетки
            state.dy = -1.0 - Math.random() * getSpeed() * 0.5;//получаем новую вертикальную скорость с элементом случайности
            state.dx = getDx(state.dy); //в зависимости от вертикальной составляющей скорости вычисляем горизонтальную
            //суставляющую скорости с помощью функции getDX. Это нужно, чтобы полная скорость
            //соответствовала скорости для данного уровня
            state.points++;  //увеличиваем очки на 1
            if (state.points % 10 == 0) state.level++; //если количество очков кратно 10, увеличиваем уровень
            drawText();
        }
        else if (state.y >= 574) //если коснулись нижнего края, игра заканчивается
            gameOver();
    }
}

function getSpeed() { //функция возвращает скорость в зависимости от уровня. Нужно настроить.
    return 1.0 + 1.0 * state.level
}

function getDx(dy) { //функция возвращает x-составляющую скорости, в зависимости от y-составляющей
    var speed = getSpeed();
    var dx = Math.sqrt(speed * speed - dy * dy); //по теореме Пифагора находим x-составляющую скорости
    if (Math.random() < 0.5) dx = -dx; //случайно выбираем знак горизонтальной скорости (+ или - т.е. вправо или влево)
    return dx;
}

//по сути игра начинается здесь, поскольку выше мы описывали функции, если их не вызывать, то сами они работать не будут.

setInterval(move, 10); //вызываем функцию move каждые 10 милисекунд
gameInit();

document.addEventListener('keydown', (e) => {//добавляем документу слушатель событий. "слушаем" нажатие клавиш
    if (state.gamestart && !state.gameover) { //если игра начата, но не закончена
        if (e.key == 'ArrowLeft' && state.cx >= 60) { //если нажата клавиша влево и ракетка не у левого края
            показатьРакетку(false); //стираем ракетку
            state.cx -= 20; //уменьшаем ее координаты на 20 пикселов
            показатьРакетку(true);//рисуем ракетку по новым координатам
        }
        if (e.key == 'ArrowRight' && state.cx <= 540) { //аналогично для клавиши вправо
            показатьРакетку(false);
            state.cx += 20;
            показатьРакетку(true);
        }
    }

});

function drawText() {
    ctx2.clearRect(0, 0, 600, 100);
    ctx2.fillStyle = "rgba(255,255,224,0.5)";
    ctx2.font = "26px sans-serif";
    ctx2.fillText('Очки: ' + state.points, 0, 30);
    ctx2.fillText('Уровень: ' + state.level, 450, 30);
}

function gameOver() {
    state.gameover = true;
    ctx2.fillStyle = "rgba(255,255,224,0.5)";
    ctx2.font = "36px sans-serif";
    var w = ctx2.measureText('Game Over!').width;
    ctx2.fillText('Game Over!', 300 - w / 2, 300 + 18);
    var btn = document.getElementById('btn1');
    btn.innerHTML = 'СТАРТ';
}

function gameInit() {
    state.x = 300;
    state.y = 300;
    state.dx = 0;
    state.dy = 1.5;
    state.cx = 300;
    state.points = 0;
    state.level = 1;
    state.gamestart = false;
    state.gameover = false;
    ctx.fillStyle = fc;//цвет заливки
    ctx.fillRect(0, 0, 600, 600);//залитый прямоугольник - фон
    ctx2.clearRect(0, 0, 600, 600);
    drawText();
    показатьРакетку(true); //показывем ракетку
}

function btn1Click() {
    var btn = document.getElementById('btn1');
    if (btn.innerHTML == 'СТАРТ' && !state.gameover) {
        state.gamestart = true;
        btn.innerHTML = 'ПАУЗА';
    }
    else if (btn.innerHTML == 'ПАУЗА') {
        state.gamestart = false;
        btn.innerHTML = 'ВОЗОБНОВИТЬ';
    }
    else if (btn.innerHTML == 'ВОЗОБНОВИТЬ') {
        state.gamestart = true;
        btn.innerHTML = 'ПАУЗА';
    }
    else if (btn.innerHTML == 'СТАРТ' && state.gameover) {
        gameInit();
        state.gamestart = true;
        btn.innerHTML = 'ПАУЗА';
    }


}