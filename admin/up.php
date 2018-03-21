<?php

session_start();
if($_SESSION['auth'] == 1)
{
// обновляем данные
require '../config/config.php';

if (!isset($_POST['id']))  echo "<h1>Ошибка обновления данных</h1> ";

$name= $_POST['nazv'];
$category = $_POST['categ'];
$description = $_POST['descr'];
$price = $_POST['tsena'];
$id = $_POST['id'];


// заменяем ' на \'
   $name = str_replace("'", "\'", $name);
   $category= str_replace("'", "\'", $category);
   $description = str_replace("'", "\'", $description);
   $price = str_replace("'", "\'", $price);




$upload = mysql_query ("UPDATE content SET name = '$name', category = '$category', description = '$description',price = '$price' WHERE id = $id") or die (mysql_error());


if (($upload) == 'true') {
			echo "<h1>Данные успешно обновлены<br /><a href='../admin/red.php?page=1'>Вернуться на главную</a></h1>";
		}

else echo "<h1>Данные не обновлены</h1>" . mysql_error();
}
else echo join('', file('access.html'));
