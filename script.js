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

/************************************************************************************
 * код выше объяснялся на отдном из предыдущих уроках
 */

console.log('Привет!'); // данная функция служит для отображения значений в консоли
console.log(sum(10, 15));
console.log(sum(7, 20));

function showModal() { //фунция, которая делает модальное окно видимым
    var win = document.getElementById('modal'); //находим элемент на странице с id modal
    win.style.display = 'block';// меняем его свойство стиля с none на blocl
}

var bClose = document.getElementById('button_close');//находим элемент с id button_close - кнопку закрытия модального окна
bClose.addEventListener('click', closeModal);//добавляем слушатель событий на событие "клавиша мыши". При нажатии
//запускаем фукнцию closeModal

function closeModal() {//функция, которая делает модальное окно невидимым
    var win = document.getElementById('modal');//находим модальное окно
    win.style.display = 'none';//ставим ему свойство отображения none
}
/*
Данная функия создает новую карточку товара. На вход поступают следующие данные:
путь к картинке, название товара, описание товара, цена и его id в базе данных
*/
function createCard(img, title, desc, price, id = 0) {
    var cardWrapper = document.createElement('div');//создаем div-элемент (блок) с классом card
    cardWrapper.className = 'card';

    var imgW = document.createElement('div');//создаем div-элемент(блок) с классом card_image_wrapper
    imgW.className = 'card_image_wrapper';
    var imgE = document.createElement('img');//создаем img-элемента с классом card_image
    imgE.className = 'card_image';
    imgE.src = img; //в свойство, отвечающее за источник изображения, копируем значение пути к картинке
    imgW.append(imgE); //делаем картинку дочерним компонентом для блока класса card_image_wrapper
    cardWrapper.append(imgW);//делаем блок класса card_image_wrapper дочерним компонентом блока card

    var cnw = document.createElement('div');//создаем div-элемент(блок) с классом card_name_wrapper
    cnw.className = 'card_name_wrapper';
    cnw.innerHTML = '&laquo;' + title + '&raquo;';//в содержимое блока копируем название товара
    cardWrapper.append(cnw);//делаем блок класса card_name_wrapper дочерним компонентом блока card

    var cdw = document.createElement('div');//создаем div-элемент(блок) с классом card_description_wrapper
    cdw.className = 'card_description_wrapper';
    cdw.innerHTML = desc;//в содержимое блока копируем описание товара
    cardWrapper.append(cdw);//делаем блок класса card_description_wrapper дочерним компонентом блока card

    var cpw = document.createElement('div');//создаем div-элемент(блок) с классом card_price_wrapper
    cpw.className = 'card_price_wrapper';
    cpw.innerHTML = '<b>Цена: </b>' + price + ' р.';//в содержимое блока копируем цену товара
    cardWrapper.append(cpw);//делаем блок класса card_price_wrapper дочерним компонентом блока card

    var cb = document.createElement('div');//создаем div-элемент(блок) с классом card_button
    cb.className = 'card_button';
    cb.innerHTML = 'Купить';//в содержимое блока копируем текст "Купить"
    cb.id = 'card_button_' + id;//назначаем id для данного блока, в состав которого входит id товара из базы данных
    cardWrapper.append(cb);//делаем блок класса card_button дочерним компонентом блока card

    var mn = document.getElementById('main');//находим элемент (блок) с классом main
    mn.append(cardWrapper);//делаем блок класса card дочерним компонентом блока main
}

createCard('./img/tv.png', 'Ноутбук', 'Какое-то описание', 20000); //создаем карточку товара
createCard('./img/tv.png', 'Монитор', 'Еще какое-то описание', 15000);//создаем еще одну карточку

for (var i = 0; i < 100; i++) // создаем 100 одинаковых карточек товара
    createCard('./img/tv.png', 'Монитор', 'Еще какое-то описание', 15000, i);
