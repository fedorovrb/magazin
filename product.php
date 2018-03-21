
<!doctype html>

<html>
	<head>
		<title>Подробнее</title>
		<link rel="shortcut icon" href="images/logo test.png" type="image/x-icon">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		 
        <script src="js/jquery-2.0.2.min.js"></script>
         <script>
            $(document).ready(function(){
                //Скрыть PopUp при загрузке страницы  
                PopUpHide1();
                PopUpHide();
                
            });
            //Функция отображения PopUp
            function PopUpShow(){
                $("#popup1").show();
            }
            //Функция скрытия PopUp
            function PopUpHide(){
                $("#popup1").hide();
                
            }
             function PopUpShow1(){
                $("#popup11").show();
            }
            //Функция скрытия PopUp
            function PopUpHide1(){
                $("#popup11").hide();
                
            }
        </script>
              
            <link href="css/product.css?<?=filemtime( 'css/product.css' )?>" rel="stylesheet">   
        		<script>
                    $(function(){
        $('.sort0 .hide').hide();
        $a = $('.sort0 #s');
        $a.on('click', function(event) {
        event.preventDefault();
        $a.not(this).next().slideUp(500);
        $(this).next().slideToggle(500);
        });
                    });
</script>

	</head>

	<body onload = "aa()">
	    <div class="body">
	 <!-- всплывающее окно -->
        <div class="b-popup" id="popup1">
        <div class="b-popup-content">
        <br><br><br><br>Товар был успешно добавлен в корзину<br><br>
            <a href = "cart.php" style = "text-decoration-line: none;"><div id = "perehod">Перейти в корзину</div></a> 
            <a href = "javascript:PopUpHide()"  style = "text-decoration-line: none;"><div id = "perehod1">Продолжить покупки</div></a>
        </div>
            </div>
            <!-- всплывающее окно таблица размеров -->
            <div class="b-popup1" id="popup11">
        <div class="b-popup-content1">
       <a href = "javascript:PopUpHide1()" style = "float: right;"><img src = "images/krestik.png" width="20px" height="20px"></a>
       <img src = "images/Таблица.png" width="100%" height="80%">
        </div>
            </div>


<?php

require 'config/config.php';
// сортировка по категориям
echo "<div id = \"menu\">";
echo "<a href = \"index.php\"><div id = \"logo\"><span style = \"font-size: 28pt;\">M</span>ILLA <span style = \"font-size: 28pt;\">S</span>HILLA</div></a>";
?>
<div id = "poisk">
<form class= "searchform">
<input class = "searchfield" type = "text" placeholder="Поиск.." name = "search" >
<input class = "searchbutton" type = "submit" value = "Искать">
</form>
</div>

<?
echo "<div id = \"cart\">";
        echo "<a href = \"cart.php\"><img src = \"images\cart1.png\" width = \"60px\" height = \"57px\"></a>";
        echo "<span id = \"cif\">0</span>";
        echo "</div>";


echo "</div>";
$s = mysql_query("SELECT razdel FROM razdelu");
echo "<div class = \"sort\"><div class = \"sort1\">";

while($sort1 = mysql_fetch_array($s)){
    echo "<div class = \"sort0\"><a  id = \"s\" href = \"#\">$sort1[0]</a>";
    $s1 = mysql_query("SELECT name_category FROM categories WHERE razdel = '$sort1[0]'");
    echo "<div class=\"hide\">";
    while($sort = mysql_fetch_array($s1)){
        echo "<a id = \"dec\" href = catalog.php?category=" . urlencode($sort[0]) . "&page=1>$sort[0]</a><br>";
    }
    echo "</div></div>";
}
echo "</div></div>";

$N = 12;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

// если юзер выбирает категорию, выполняем сортировку
if (isset($_GET['category'])) {
    
    
    
    $category = $_GET['category'];
    
    //Число обьявлений на странице


$r1 = mysql_query("select count(*) as rec from content where category = '$category'");
$f = mysql_fetch_row($r1);
$rec = $f[0]; // всего записей в таблице
    echo "<div class = \"all\">";
    if($rec == 0) 
    {
        echo "<h2 class = \"warning\">Товаров с выбраной категорией нет в наличии</h2>";
    }
    
    else if ($rec <= $N)
    {
        
    }
  
// если страница не указана, выводим первую
if (!isset($_GET['page'])) $page = 0;
else $page = $_GET['page']-1;
// записи, которые нужно вывести
$records = $page * $N;

// запрос
$q = "select * from content where category = '$category' ORDER BY id DESC limit ".$records.", $N ";


$r = mysql_query($q); // выполняем запрос
$n = mysql_num_rows($r); // число записей



// выводим товары
for ($i = 0; $i < $n; $i++){
while ($row = mysql_fetch_array($r)){
    $result1 = mysql_query("SELECT * FROM images  ORDER BY id_content ASC");
    // картинки
    while($row1 = mysql_fetch_array($result1)){ 
                
                    if ($row[0] == $row1[1])
                    {
                    echo "<div class = \"container\"><div class=\"im\"><img src=\"images/$row1[2]\" width = \"100%\" height = \"100%\"/></div>";
                        break;
                    }
        
    }
                 
               echo "<div class = \"content\">";
              echo "<div id = \"price\">".$row[4]." UAH</div>";
              echo "<div id = \"pr\"><a href = product.php?id=$row[0]><div id =\"podrobnee\">Подробнее</div></a></div>";
              echo "</div></div>";
              
          
     
}

}
echo "<div class = count><span id = \"h1\">";
if ($page < 0) header("Location: catalog.php?category=$category&page=1"); /* Перенаправление браузера */



if ($page > 0){
	$p = $page - 1;
    $p++;
	echo "<a id = \"nazad\" href = catalog.php?category=$category&page=$p><<</a>&nbsp";
    $p++;
    echo "<a>$p</a>&nbsp"; 
}
    
else {
    $p = $page - 1;
    $p++;
	echo "<a id = \"naz\" ><<</a>&nbsp";
    $p++;
    echo "<a>$p</a>&nbsp";
}    

$page++;

// выводим ссилку на следующие пять записей (на след. страницу),
// если она есть, то есть число записей, которые нужно вывести,
// и смещение не превышают общего число записей
if ($records+$N < $rec){
    $page++;
    echo "<a id = \"vpered\" href = catalog.php?category=$category&page=$page>>></a>";  
}
   else  echo "<a id = \"vper\">>></a>";  

//вычисляем масимальную страницу

$max = $rec / $N;
$page1 = ceil($max);
if ($page > $page1+1) header("Location: catalog.php?category=$category&page=1"); /* Перенаправление браузера */
echo "</span></div></div>";
}
        

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// поиск
else if (isset($_GET['search'])){
    
    $search = $_GET['search'];
    
 echo "<div class = \"all\">";   
    $r1 = mysql_query("select count(*) as rec from content where name = '$search'");
$f = mysql_fetch_row($r1);
$rec = $f[0]; // всего записей в таблице
    if($rec == 0) 
    {
        echo "<h2 class = \"warning\">Мы не смогли ничего найти по вашему запросу</h2>";
    }

// если страница не указана, выводим первую
if (!isset($_GET['page'])) $page = 0;
else $page = $_GET['page']-1;
// записи, которые нужно вывести
$records = $page * $N;



$r = mysql_query("SELECT * FROM content WHERE name = '$search' ORDER BY id DESC limit ".$records.", $N "); // выполняем запрос
$n = mysql_num_rows($r); // число записей



// выводим товары
for ($i = 0; $i < $n; $i++){
while ($row = mysql_fetch_array($r)){
    $result1 = mysql_query("SELECT * FROM images  ORDER BY id_content ASC");
    // картинки
    while($row1 = mysql_fetch_array($result1)){ 
                
                    if ($row[0] == $row1[1])
                    {
                    echo "<div class = \"container\"><div class=\"im\"><img src=\"images/$row1[2]\" width = \"100%\" height = \"100%\"/></div>";
                        break;
                    }
        
    }
                 
                echo "<div class = \"content\">";
              echo "<div id = \"price\">".$row[4]." UAH</div>";
              echo "<div id = \"pr\"><a href = product.php?id=$row[0]><div id =\"podrobnee\">Подробнее</div></a></div>";
              echo "</div></div>";
              
          
     
}
    
    
    
}
     echo "<div class = count><span id = \"h1\">";

if ($page < 0) header("Location: catalog.php?search=$search&page=1"); /* Перенаправление браузера */
  
if ($page > 0){
    $p = $page - 1;
	$p++;
	echo "<a id = \"nazad\" href = catalog.php?search=$search&page=$p><<</a>&nbsp";
    $p++;
    echo "<a id = \"bor\">$p</a>&nbsp";
    
}
else{
    $p = $page - 1;
	$p++;
	echo "<a id = \"naz\"><<</a>&nbsp";
    $p++;
    echo "<a  id = \"bor\">$p</a>&nbsp";
}

$page++;

// выводим ссилку на следующие пять записей (на след. страницу),
// если она есть, то есть число записей, которые нужно вывести,
// и смещение не превышают общего число записей
if ($records+$N < $rec){
    $page++;
    echo "<a id = \"vpered\" href = catalog.php?search=$search&page=$page>>></a>";  
}
    else  echo "<a id = \"vper\">>></a>";  
    

//вычисляем масимальную страницу

$max = $rec / $N;
$page1 = ceil($max);

if ($page > $page1+1) header("Location: catalog.php?search=$search&page=$page1"); /* Перенаправление браузера */
echo "</span></div></div>";

}
        

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// выводим товар
else{
    
require 'config/config.php';

      
    $id = $_GET['id'];
    $result1 = mysql_query("SELECT * FROM images WHERE id_content = $id");
// если запись с таким id есть в базе выводим содержимое
if(mysql_num_rows($result1) > 0){
    echo "<div class = \"all\">";
     while ($row1 = mysql_fetch_array($result1)){
        echo "<div class = \"im\"><img src = \"images/$row1[2]\"  id = \"new\">";
         break;
         
    }
    $result1 = mysql_query("SELECT * FROM images WHERE id_content = $id");
    echo "<div class = \"ne_main\">";

        
         
         while ($row1 = mysql_fetch_array($result1)){  
            echo " <label class= \"cha\">";
            echo " <input type=\"radio\" value = \"images/$row1[2]\" name = \"dsadsa\" checked id = \"dsadsa\">";
            echo " <img id = \"vse\" src = \"images/$row1[2]\" width = \"70\" height = \"90\" id = \"new\"  onclick = \"javascript:colorr(src)\">";
            echo "</label>";
            break;
         }
        
        
        while ($row1 = mysql_fetch_array($result1)){  
            echo " <label class= \"cha\">";
            echo " <input type=\"radio\" value = \"images/$row1[2]\" name = \"dsadsa\"  id = \"dsadsa\">";
            echo " <img id = \"vse\" src = \"images/$row1[2]\" width = \"70\" height = \"90\" id = \"new\"  onclick = \"javascript:colorr(src)\">";
            echo "</label>";
           
        }
    
    echo "</div></div>";
    $result = mysql_query("SELECT * FROM content WHERE id = $id");
    while ($row = mysql_fetch_array($result)){
        echo "<div class = \"cont\">";
        echo "<table cellpadding = 10>";
        // название
        echo "<tr><td><h3 id = \"item_title\">$row[1]</h3></td></tr>";
    
        // описание
        echo "<tr>";
        echo "<td><div style = \"max-width: 409px; word-wrap: break-word;\">Описание:<br><br><a >$row[3]</a></div></td>";
        echo "</tr>";
        // цвет
        echo "<tr>";
    
        echo "<td><a>Цвет: </a><br><br>";
        
        $result1 = mysql_query("SELECT * FROM images WHERE id_content = $id");
        while ($row1 = mysql_fetch_array($result1)){  
            echo " <label class= \"ch\">";
            echo " <input type=\"radio\" value = \"images/$row1[2]\" name = \"dsads\" checked id = \"dsads\">";
            echo " <img src= \"images/$row1[2]\" width = \"70\" height = \"90\" onclick = \"javascript:colorr(src)\">";
            echo "</label>";
            break;
        }
        
        while ($row1 = mysql_fetch_array($result1)){  
            echo " <label class= \"ch\">";
            echo " <input type=\"radio\" value = \"images/$row1[2]\" name = \"dsads\"  id = \"dsads\">";
            echo " <img src= \"images/$row1[2]\" width = \"70\" height = \"90\" onclick = \"javascript:colorr(src)\">";
            echo "</label>";
           
        }
        
        echo "</td>";
        echo "</tr>";
        // количество
        echo "<tr>";
        echo "<td><p>Количество: <span id = \"kolich\"><a id = \"b\" onclick = \"plus()\" unselectable=\"on\">+</a><a id = \"num\">1</a><a id = \"b\" onclick = \"minus()\" unselectable=\"on\">&minus;</a></span></td>";
        echo "</tr>";
        // размер
        echo "<tr>";
        echo "<td id = \"td\"><div id = \"razme\"><a>Размер: </a>";
        echo "<select id = \"siz\">
        <option value = \"XXS\" selected>XXS</option>
            <option value = \"XS\">XS</option>
            <option value = \"S\">S</option>
            <option value = \"M\">M</option>
            <option value = \"L\">L</option>
            <option value = \"XL\">XL</option>
            <option value = \"XXL\">XXL</option>
            </select><br><br><div id = \"tabl\" onclick = \"javascript:PopUpShow1()\">Таблица размеров</div></div>";
        // цена
        echo "<div id = \"cena\"><a>Цена: </a><a id = \"item-price\" data-val = \"$row[4]\">$row[4]</a> <span>UAH</span><br><br><div class=\"add_item\" data-id=\"$row[0]\" id = \"tabl\" onclick = \"javascript:PopUpShow()\">В корзину</div></div>";
        echo "</td>";
        echo "</tr>";
        echo "</table>"; 
        echo "</div>"; 
        echo "</div>"; 
    }
    
}
    else header("Location: catalog.php?page=1");
}
        
        ?>
        <script src="js/cart.js?<?=filemtime( 'js/cart.js' )?>"></script>  
        <script src="js/product.js?<?=filemtime( 'js/product.js' )?>"></script>
        </div>
        
</body>
</html>
        

