// меняет картинку, по выбраному цвету
function colorr(src){

var a = src;
var img = document.createElement("IMG"); 
img.src = a;



img.setAttribute("id", "new");

// создаем ссылку на существующий элемент который будем заменять
var sp2 = document.getElementById("new");
var parentDiv = sp2.parentNode;

// заменяем существующий элемент sp2 на созданный нами img
parentDiv.replaceChild(img, sp2);

}

//плюсует количество и цену товара
function plus(){
    var j = document.getElementById("num").innerHTML;
    j++;
    var q =  parseFloat(document.getElementById("item-price").innerHTML);
    q += dataval();
    q = q.toFixed(2);
    document.getElementById("num").innerHTML = j;
    document.getElementById("item-price").innerHTML = q;
}

//минусует количество и цену товара
function minus(){
    var j = document.getElementById("num").innerHTML;
    if(j > 1){
        j--;
            var q =  parseFloat(document.getElementById("item-price").innerHTML);
            q -= dataval();
            q = q.toFixed(2);
            document.getElementById("item-price").innerHTML = q;
    }
    document.getElementById("num").innerHTML = j;
}

// возвращает цену товара за единицу
function dataval(){
        var z = document.getElementById("item-price");
        var val = parseFloat(z.getAttribute("data-val"));
    return val;
}








