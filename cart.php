<html>
  <head>
<title>Корзина</title>
   <link href="css/cart.css?<?=filemtime( 'css/cart.css' )?>" rel="stylesheet">  
<link href="css/catalog.css?<?=filemtime( 'css/catalog.css' )?>" rel="stylesheet">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/logo test.png" type="image/x-icon">
</head>
<body onload="openCart()">
 <div class="body">
  <div id = "menu">
      <a href = "index.php"><div id = "logo"><span style = "font-size: 28pt;">M</span>ILLA <span style = "font-size: 28pt;">S</span>HILLA</div></a>
      
      <h1 id = "help">Помощь по телефону: 0669876578</h1></div>
      
    <div id="cart_content"></div>
    
    <div id="my_form" style="display: none;">
   
    <form id = "rok" method="POST" onsubmit="return proverka()" action = "submit.php">
       <div id = "t">
      
            <input type = "text" id = "f"  value = "" name = "f" placeholder="Фамилия"><p id = "f1"></p>
    
       
           <input type = "text" id = "i" value = "" name = "i" placeholder="Имя"><p id = "i1"></p>
       
           <input type = "text" id = "n" value = "" name = "n" placeholder="Номер телефона"><p id = "n1"></p>
        
            <select onchange="dostavka(this.value)" id = "dost" name ="dost">
                <option selected value="0">Выберите способ доставки</option>
                <option value="1">Новая Почта</option>
                <option value="2">Укрпочта</option>
                <option value="3">Самовывоз</option>
                <option value="4">Другое</option>
            </select>
            
            <div id = "nov" style="display: none;">
               <br>
                <input type = "text" id = "gorod" name = "gorod" placeholder="Город"><p id ="gorod1"></p>
                <input type = "text" size = "4" id = "nomernp" name = "nomernp" placeholder="Номер отделения Новой Почты"><p id ="nomernp1"></p>
            </div>
            
            
            
            <div id = "ukr" style="display: none;">
               <br>
                <input type = "text" id = "gorodd" name = "gorodd" placeholder="Город"><p id ="gorodd1"></p>
                <input type = "text" id = "street" name = "street" placeholder="Улица"><p id ="street1"></p>
                <input type = "text" id = "house" size = 4 name = "house" placeholder="Дом"><p id ="house1"></p>
                <input type = "text" id = "apart" size = 4 name = "apart" placeholder="Квартира"><p id ="apart1"></p>
                <input type = "text" id = "index" size = 8 name = "index" placeholder="Почтовый индекс"><p id ="index1"></p>
            </div>
            
           
            
            <div id = "sam" style="display: none;">
               <br>
                <a>Вы можете самостоятельно забрать посылку<br> по адресу</a><br><br>
            </div>
            
    
            
            <div id = "els" style="display: none;">
               <br>
                <textarea rows = "10" id = "tex" name = "tex" placeholder = "Укажите желаемый способ доставки"></textarea><p id = "tex1"></p><br><br>
            </div>
            <p id ="r1"></p>
           <input type = "submit" value="Купить" id = "kypit">
           
        </div></form></div>
     <script src="js/cart.js?<?=filemtime( 'js/cart.js' )?>"></script>
    <script>
        
    var data = JSON.stringify(localStorage.getItem('cart')); 
    
        data = data.slice(1, -1);
        var res = data.replace(/\\"/g, "\"");

     
    document.write('<input type=\'text\' style = \'display: none\' name=\'data\' value = \'' + res + '\' form = \'rok\'</p>'); 
    
       
        
    </script>
    </div>
</body>
</html>



