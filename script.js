var block = document.getElementById('test');
block.innerHTML = '<h1>Hello World!!!</h1>';
block.style.color = '#00ff00';
block.style.backgroundColor = 'rgb(0,0,255)';
block.style.width = '600px';
block.style.margin = '0 auto';
block.style.textAlign = 'center';

var count = 0;
var interval = setInterval(() => {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    block.style.color = 'rgb(' + r + ',' + g + ',' + b + ')';
    count++;
    if (count == 40) {
        clearInterval(interval);
        block.innerHTML = '';
    }
}, 250);

var str = '';
for (var i = 1000; i >= 0; i--) {
    str = str + i + ' ';
}
block.innerHTML = str;

function sum(a, b) {
    var c = a + b;
    return c;
}

console.log('Привет!');
console.log(sum(10, 15));
console.log(sum(7, 20));

function showModal() {
    var win = document.getElementById('modal');
    win.style.display = 'block';
}

var bClose = document.getElementById('button_close');
bClose.addEventListener('click', closeModal);

function closeModal() {
    var win = document.getElementById('modal');
    win.style.display = 'none';
}

function createCard(img, title, desc, price, id = 0) {
    var cardWrapper = document.createElement('div');
    cardWrapper.className = 'card';

    var imgW = document.createElement('div');
    imgW.className = 'card_image_wrapper';
    var imgE = document.createElement('img');
    imgE.className = 'card_image';
    imgE.src = img;
    imgW.append(imgE);
    cardWrapper.append(imgW);

    var cnw = document.createElement('div');
    cnw.className = 'card_name_wrapper';
    cnw.innerHTML = '&laquo;' + title + '&raquo;';
    cardWrapper.append(cnw);

    var cdw = document.createElement('div');
    cdw.className = 'card_description_wrapper';
    cdw.innerHTML = desc;
    cardWrapper.append(cdw);

    var cpw = document.createElement('div');
    cpw.className = 'card_price_wrapper';
    cpw.innerHTML = '<b>Цена: </b>' + price + ' р.';
    cardWrapper.append(cpw);

    var cb = document.createElement('div');
    cb.className = 'card_button';
    cb.innerHTML = 'Купить';
    cb.id = 'card_button_' + id;
    cardWrapper.append(cb);

    var mn = document.getElementById('main');
    mn.append(cardWrapper);
}

createCard('./img/tv.png', 'Ноутбук', 'Какое-то описание', 20000);
createCard('./img/tv.png', 'Монитор', 'Еще какое-то описание', 15000);

for (var i = 0; i < 100; i++)
    createCard('./img/tv.png', 'Монитор', 'Еще какое-то описание', 15000, i);
