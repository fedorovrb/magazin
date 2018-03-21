
var d = document,
   itemBox = d.querySelectorAll('.cont'), 
   cartCont = d.getElementById('cart_content'); 

// Функция кроссбраузерной установка обработчика событий
function addEvent(elem, type, handler){
  if(elem.addEventListener){
    elem.addEventListener(type, handler, false);
  } else {
    elem.attachEvent('on'+type, function(){ handler.call( elem ); });
  }
  return false;
}
// Получаем данные из LocalStorage
function getCartData(){
  return JSON.parse(localStorage.getItem('cart'));
}
// Записываем данные в LocalStorage
function setCartData(o){
  localStorage.setItem('cart', JSON.stringify(o));
  return false;
}


// Добавляем товар в корзину
function addToCart(e){
  this.disabled = true; // блокируем кнопку на время операции с корзиной
  var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
      itemRand =  makeid(),
      itemId = this.getAttribute('data-id'), // ID товара
      itemTitle = d.getElementById('item_title').innerHTML, // название товара
      itemPrice = parseFloat(d.getElementById('item-price').innerHTML), // стоимость товара
      itemKolvo = parseInt(d.getElementById('num').innerHTML),
      itemColor = d.getElementsByName('dsads'),
      itemSize = d.getElementById('siz').value

for (var i = 0, length = itemColor.length; i < length; i++) {
    if (itemColor[i].checked) {
        // do whatever you want with the checked radio
        itemColor = itemColor[i].value;
        // only one radio can be logically checked, don't check the rest
        break;
    }
}
    cartData[itemRand] = [itemId, itemTitle, itemColor, itemSize, itemKolvo, itemPrice];
      var cif = parseInt(localStorage.getItem('cif'));
        cif++;
        localStorage.setItem('cif', cif);

  if(!setCartData(cartData)){ // Обновляем данные в LocalStorage
    this.disabled = false; // разблокируем кнопку после обновления LS
  }
 return false;
}
// Устанавливаем обработчик события на каждую кнопку "Добавить в корзину"
for(var i = 0; i < itemBox.length; i++){
  addEvent(itemBox[i].querySelector('.add_item'), 'click', addToCart);
}
// Открываем корзину со списком добавленных товаров
function openCart(e){
    var cartData = getCartData(), // вытаскиваем все данные корзины
    totalItems = '';
    
    // если в корзине пусто, то сигнализируем об этом
    counter = 0;
    for (var i in cartData) if (cartData[i] != "") counter++;
    
    if(counter == 0) {
        cartCont.innerHTML = '<h1 style = "float: left; width: 100%; text-align: center; margin-top: 100px;">Корзина пуста</h1>';
        localStorage.setItem('cif', 0);
    }
    // если что-то в корзине уже есть, начинаем формировать данные для вывода
    else
    {
      var total = 0;
      var j = -1;
     totalItems = '<table id="shopping_list" cellpadding = "10" cellspacing = "10"><tr><th id = "nym">Артикул</th><th id = "nym">Наименование</th><th id = "nym">Цвет</th><th id = "nym">Размер</th><th id = "nym">Кол-во</th><th id = "nym1">Цена</th></tr>';
    for(var items in cartData){
      totalItems += '<tr id = "xzkaknazvat">';
      for(var i = 0; i < cartData[items].length; i++){
          
        if(i == 2)
            {
                totalItems += '<td><img src = \"' + cartData[items][i] + '\" width = \"70\" height = \"100\"></td>';
            }
          else if(i == 4)
            {
                totalItems += '<td>' + cartData[items][i] + ' шт.</td>';
            }
          
           else if(i == 5)
            {
                totalItems += '<td>' + cartData[items][i] + ' UAH</td>';
                total += cartData[items][i]; 
                
            }
          else totalItems += '<td>' + cartData[items][i] + '</td>';
      }
        j += 1;
        totalItems += '<td><img src = "images/krestik.png" width = "20" height = "20" onclick = "del(' + j + ')" id = "im" title="Удалить" style = "cursor: pointer;"></td>';
        
      totalItems += '</tr>';
    }
      totalItems += '<tr><th id = "non"></th><th id = "non"></th><th id = "non"></th><th id = "non"></th><th >Всего к оплате</th><th style = "background-color: red; color: white;">' + total.toFixed(2) + ' UAH</th></tr>';
        
      
    totalItems += '</table>';
      totalItems +=  '<div id="knop"><button onclick="history.back()"id="checkout1">Вернуться назад</button>';
        
        totalItems +=  '<a href = "#t"><button id="checkout" onclick="bloc()";>Оформить заказ</button></a></div>';
       
      totalItems += '<style>td{ text-align: center; }</style>';
      
 cartCont.innerHTML = totalItems;

  } 
  return false;
}
// удалить один товар из корзины
function del(j){
        var cartData = getCartData();
        var el = Object.keys(cartData)[j];
        delete cartData[el];
        setCartData(cartData);
        var cif = parseInt(localStorage.getItem('cif'));
        cif--;
        localStorage.setItem('cif', cif);
        location.reload();
}


function aa(){
     var cif1 = localStorage.getItem('cif');
    if (isNaN(cif1)){
        cif1 = 1;
        localStorage.setItem('cif', cif1);
    }
   document.getElementById('cif').innerHTML = cif1;
} 

// генератор случайной строки
function makeid()
{
    var text = "";
    var possible = "abcdefghijklmnopqrstuvwxyz";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

// отображает форму оформления заказа
function bloc(){
   document.getElementById('checkout').style.display = 'none'; document.getElementById('checkout1').style.display = 'none';  document.getElementById('my_form').style.display='block'; document.getElementById('shopping_list').style.pointerEvents = "none"; document.getElementById('shopping_list').style.backgroundColor = "#F5F5F5";
}

// проверяет правильность данных
function proverka()
{
    document.getElementById("r1").innerHTML = '';
    var f = document.getElementById("f").value;
    var i = document.getElementById("i").value;
    var n = document.getElementById("n").value;
    var r = document.getElementById("dost").selectedIndex;
   
    f = f.match(/^[A-ZА-ЯІЇЄҐ][A-za-zА-Яа-яІіЇїЄєҐґ'ʼ-\s]+$/);
    i = i.match(/^[A-ZА-ЯІЇЄҐ][A-za-zА-Яа-яІіЇїЄєҐґ'ʼ-\s]+$/);
    n = n.match(/^(\+|[0-9]{1})([0-9]){9,12}$/);
    
    if(f == null) 
    {
        document.getElementById("f1").innerHTML = 'Фамилия указана неверно';
        document.getElementById("f").style.borderColor = "red";
        return false;
    }
    if(f != null) 
    {
        document.getElementById("f1").innerHTML = '';
        document.getElementById("f").style.borderColor = "#0000FF";
    }
    if(i == null){
        document.getElementById("i1").innerHTML = 'Имя указано неверно';
        document.getElementById("i").style.borderColor = "red";
        return false;
    }
    if(i != null) 
    {
        document.getElementById("i1").innerHTML = '';
        document.getElementById("i").style.borderColor = "#0000FF";
    }
    if(n == null){
        document.getElementById("n1").innerHTML = 'Номер телефона указан неверно';
        document.getElementById("n").style.borderColor = "red";
        return false;
    } 
    if(n != null) 
    {
        document.getElementById("n1").innerHTML = '';
        document.getElementById("n").style.borderColor = "#0000FF";
    }
    
   
    
    if (r == "0")
    {
        document.getElementById("r1").innerHTML = 'Не выбран способ доставки';
        return false;
    }

    
    
else if (r == "1"){
     var gorod = document.getElementById("gorod").value;
     var nomernp= document.getElementById("nomernp").value;
    
     
     gorod = gorod.match(/^[А-Яа-яІіЇїЄєҐґ'ʼ-\s]{2,}$/);
     nomernp = nomernp.match(/^[0-9]{1,3}$/);
     
     if(gorod == null){
        document.getElementById("gorod1").innerHTML = 'Город указан неверно';
        document.getElementById("gorod").style.borderColor = "red";
        return false;
     }
     if(gorod != null) 
     {
        document.getElementById("gorod1").innerHTML = '';
        document.getElementById("gorod").style.borderColor = "#0000FF";
     }
    
    if(nomernp == null){
        document.getElementById("nomernp1").innerHTML = 'Номер отделения указан неверно';
        document.getElementById("nomernp").style.borderColor = "red";
        return false;
     }
     if(nomernp != null) 
     {
        document.getElementById("nomernp1").innerHTML = '';
        document.getElementById("nomernp").style.borderColor = "#0000FF";
     }
    }
    
else if (r == "2"){
    var gorodd = document.getElementById("gorodd").value;
    var street = document.getElementById("street").value;
    var apart = document.getElementById("apart").value;
    var house = document.getElementById("house").value;
    var index = document.getElementById("index").value;
    
    gorodd = gorodd.match(/^[А-Яа-яІіЇїЄєҐґ'ʼ-\s]{2,}$/);
    street = street.match(/^[А-Яа-яІіЇїЄєҐґ'ʼ.-\s]+$/);
    apart = apart.match(/^[0-9]{1,4}$/);
    house = house.match(/^[0-9]{1,4}$/);
    index = index.match(/^[0-9]{5,6}$/);
    
    if(gorodd == null){
        document.getElementById("gorodd1").innerHTML = 'Город указан неверно';
        document.getElementById("gorodd").style.borderColor = "red";
        return false;
     }
     if(gorodd != null) 
     {
        document.getElementById("gorodd1").innerHTML = '';
        document.getElementById("gorodd").style.borderColor = "#0000FF";
     }
    
     if(street == null){
        document.getElementById("street1").innerHTML = 'Улица указана неверно';
        document.getElementById("street").style.borderColor = "red";
        return false;
     }
     if(street != null) 
     {
        document.getElementById("street1").innerHTML = '';
        document.getElementById("street").style.borderColor = "#0000FF";
     }
    
    if(house == null){
        document.getElementById("house1").innerHTML = 'Дом указан неверно';
        document.getElementById("house").style.borderColor = "red";
        return false;
     }
     if(house != null) 
     {
        document.getElementById("house1").innerHTML = '';
        document.getElementById("house").style.borderColor = "#0000FF";
     }
    
    
    if(apart == null){
        document.getElementById("apart1").innerHTML = 'Квартира указана неверно';
        document.getElementById("apart").style.borderColor = "red";
        return false;
     }
     if(apart != null) 
     {
        document.getElementById("apart1").innerHTML = '';
        document.getElementById("apart").style.borderColor = "#0000FF";
     }
     
     if(index == null){
        document.getElementById("index1").innerHTML = 'Индекс указан неверно';
        document.getElementById("index").style.borderColor = "red";
        return false;
     }
     if(index != null) 
     {
        document.getElementById("index1").innerHTML = '';
        document.getElementById("index").style.borderColor = "#0000FF";
     }
    
    
    }
else if (r == "3") {
    return true;
}

else if (r == "4") {
    var tex = document.getElementById("tex").value;
    tex = tex.match(/^[A-Za-zА-Яа-яІіЇїЄєҐґ'ʼ\-\.\:\,\_\s]{10,}$/);
    
    if(tex == null){
        document.getElementById("tex1").innerHTML = 'Введите минимум 10 символов';
        document.getElementById("tex").style.borderColor = "red";
        return false;
     }
     if(tex != null) 
     {
        document.getElementById("tex1").innerHTML = '';
        document.getElementById("tex").style.borderColor = "#0000FF";
     }
}   
    return true;
}

function dostavka(e)
{
    if(e == "1"){  
        document.getElementById('nov').style.display='block'; document.getElementById('ukr').style.display='none'; document.getElementById('sam').style.display='none'; document.getElementById('els').style.display='none';
    }
    if(e == "2"){
        document.getElementById('nov').style.display='none'; document.getElementById('ukr').style.display='block'; document.getElementById('sam').style.display='none'; document.getElementById('els').style.display='none';
    }
    if(e == "3"){
         document.getElementById('nov').style.display='none'; document.getElementById('ukr').style.display='none'; document.getElementById('sam').style.display='block'; document.getElementById('els').style.display='none'; 
    }
    if(e == "4"){
        document.getElementById('nov').style.display='none'; document.getElementById('ukr').style.display='none'; document.getElementById('sam').style.display='none'; document.getElementById('els').style.display='block';   
    }
}



