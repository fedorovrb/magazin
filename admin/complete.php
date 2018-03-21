<?php

session_start();
if($_SESSION['auth'] == 1)
{

require '../config/config.php';

// проверяем на существование переменные

   $name= $_POST['nazv'];
   $category = $_POST['categ'];
   $description = $_POST['descr'];
   $price = $_POST['tsena'];
   

// заменяем ' на \'
   $name = str_replace("'", "\'", $name);
   $category= str_replace("'", "\'", $category);
   $description = str_replace("'", "\'", $description);
   $price = str_replace("'", "\'", $price);



    // если файл загружен, сообщаем об этом
    
    $filesDir = '../images/';

    for($i = 0;$i < count($_FILES["myfile"]["name"]);$i++) {
    if(is_uploaded_file($_FILES["myfile"]["tmp_name"][$i]))
    {
        move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], "$filesDir".$_FILES["myfile"]["name"][$i]);
    } else echo("<h1>Изображение не было загружено<h1>");
}
    

mysql_query("INSERT INTO content  VALUES('', '$name', '$category', '$description', '$price')") or die(mysql_error());// добавляем данные в бд

$result = mysql_query('SELECT * FROM content ORDER BY id DESC LIMIT 1'); // запрос на выборку
$row=mysql_fetch_row($result);
$id_content = $row[0];// выводим данные


  for($i = 0;$i < count($_FILES["myfile"]["name"]);$i++) 
    {
        $img = $_FILES["myfile"]["name"][$i];
        
        mysql_query("INSERT INTO images VALUES('', '$id_content', '$img')") or die(mysql_error());// добавляем данные в бд
        
    }
            
        

echo '<h1>Товар был успешно создан<h1>';
echo '<a href=../admin/red.php?page=1>Вернуться к просмотру всех товаров</a>';
    
}
else echo join('', file('access.html'));    