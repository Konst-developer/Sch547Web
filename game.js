var canv = document.getElementById('canv');
canv.width = 600;
canv.height = 600;
var ctx = canv.getContext('2d');

var fc = 'rgb(0,0,50)';//цвет фона
var bc = 'rgb(255,255,150)';//цвет шарика
var state = {
    x: 300,
    y: 300,
    dx: 1,
    dy: 2,
    cx: 300,
    points: 0,
    level: 1,
    gamestart: true,
    gameover: false,
};



function showBall(vis) {
    if (vis) {
        ctx.fillStyle = bc;
        ctx.beginPath();
        ctx.arc(state.x, state.y, 25, 0, 2 * Math.PI);
        ctx.fill();
    }
    else {
        ctx.fillStyle = fc;
        ctx.beginPath();
        ctx.arc(state.x, state.y, 26, 0, 2 * Math.PI);
        ctx.fill();
    }
}

function показатьРакетку(vis) {
    if (vis) {
        ctx.fillStyle = 'rgb(255,0,0)';
        ctx.fillRect(state.cx - 50, 575, 100, 25);
    }
    else {
        ctx.fillStyle = fc;
        ctx.fillRect(state.cx - 51, 574, 102, 27);
    }
}

function move() {
    if (state.gamestart && !state.gameover) {
        showBall(false);
        state.x += state.dx;
        state.y += state.dy;
        showBall(true);
        if (state.x > 574 || state.x < 25) state.dx = -state.dx;
        if (state.y < 25) state.dy = -state.dy;
        if (state.y >= 574 && state.x >= state.cx - 50 && state.x <= state.cx + 50) {
            state.y = -(Math.random() * 2);
            state.x = -2.0 + Math.random() * 4;
        }
        else if (state.y >= 599)
            state.gameover = true;
    }
}

ctx.fillStyle = fc;//цвет заливки
ctx.fillRect(0, 0, 600, 600);//залитый прямоугольник

setInterval(move, 1);
показатьРакетку(true);

document.addEventListener('keydown', (e) => {
    if (state.gamestart && !state.gameover) {
        if (e.key == 'ArrowLeft' && state.cx >= 60) {
            показатьРакетку(false);
            state.cx -= 20;
            показатьРакетку(true);
        }
        if (e.key == 'ArrowRight' && state.cx <= 540) {
            показатьРакетку(false);
            state.cx += 20;
            показатьРакетку(true);
        }
    }

});