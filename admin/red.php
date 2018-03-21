
<?php
session_start();
if($_SESSION['auth'] == 1)
{

    echo "<a href = \"../admin/exit.php\">Выйти</a>";

require '../config/config.php';
//Число обьявлений на странице
$N = 16;

$r1 = mysql_query("select count(*) as rec from content");
$f = mysql_fetch_row($r1);
$rec = $f[0]; // всего записей в таблице

// если страница не указана, выводим первую
if (!isset($_GET['page'])) $page = 0;
else $page = $_GET['page']-1;
// записи, которые нужно вывести
$records = $page * $N;

// запрос
$q = "select * from content ORDER BY id DESC limit ".$records.", $N ";

echo "<h1>Всего добавлено товаров: " . $rec . "<br></h1>";

$r = mysql_query($q); // выполняем запрос
$n = mysql_num_rows($r); // число записей

echo '<h1><a href=../admin/zakazu.php>Полученые заказы</a><h1>';
echo '<h1><a href=../admin/create.php>Добавить новый товар</a><h1>';
echo '<h1><a href=../admin/create_razdel.php>Добавить новый раздел</a><h1>';
echo '<h1><a href=../admin/create_category.php>Добавить новую категорию</a><h1>';
echo '<h1><a href=../admin/create_gallery.php>Добавить изображение в галерею</a><h1>';
echo '<h1><a href=../catalog.php?page=1>Перейти в каталог</a><h1>';
// выводим обьявления


echo"<table border = 1 bordercolor = blue cellpadding = 10 border-collapse = collapse>";

echo "<tr>";
              echo "<td>";
              echo "ID";
              echo "</td>";
              echo "<td>";
              echo "Изображение";
              echo "</td>";
              echo "<td>";
              echo "Название";
              echo "</td>";
              echo "<td>";
              echo "Категория";
              echo "</td>";
              echo "<td>";
              echo "Описание";
              echo "</td>";
              echo "<td>";
              echo "Цена";
              echo "</td>";
              echo "<td>";
              echo "Ссылка";
              echo "</td>";
echo"</tr>";

// выводим товары
for ($i = 0; $i < $n; $i++){
while ($row = mysql_fetch_array($r)){

    $result1 = mysql_query("SELECT * FROM images  ORDER BY id_content DESC");
        echo "<tr>";
    echo "<td>";
    echo $row[0];
    echo "</td>";
    echo "<td>";
    // картинки
    while ($row1 = mysql_fetch_array($result1)){ 
                
                    if ($row[0] == $row1[1])
                    echo "<img src=\"../images/$row1[2]\" width = \"30\" height = \"30\"/>";
    }
                 
     // данные
       echo "</td>";
              echo "<td>";
              echo $row[1];
              echo "</td>";
              echo "<td>";
              echo $row[2];
              echo "</td>";
              echo "<td>";
              echo $row[3];
              echo "</td>";
              echo "<td>";
              echo $row[4];
              echo "</td>";
              echo "<td>";
              echo "<a href = \"/MAGAZIN/product.php?id=$row[0]\">Перейти к товару</a>";
              echo "</td>";
              echo "<td>";
              // редактировать
              echo "<a href = \"../admin/upload.php?id=$row[0]\"><img src=\"../images/pencil.png\" alt = \"Редактировать\" width = \"20\" height = \"20\"</a>";
              // удалить
              echo "<a href = \"../admin/delete.php?id=$row[0]\"><img src=\"../images/krestik.png\" alt = \"Удалить\" width = \"20\" height = \"20\"></a>";
              echo "</td>";
       echo"</tr>";    
}
echo "</table>"; 
}

if ($page < 0) header("Location: ../admin/red.php?page=1"); /* Перенаправление браузера */

if ($page >= 2) echo "<a href = red.php?page=1>1</a>&nbsp<a>...</a>&nbsp";



if ($page == 0) echo "<a>1</a>&nbsp";


if ($page > 0){
	$p = $page - 1;
    $p++;
	echo "<a href = red.php?page=$p>$p</a>&nbsp";
    $p++;
    echo "<a>$p</a>&nbsp";
    
}

$page++;

// выводим ссилку на следующие пять записей (на след. страницу),
// если она есть, то есть число записей, которые нужно вывести,
// и смещение не превышают общего число записей
if ($records+$N < $rec){
    $page++;
    echo "<a href = red.php?page=$page>$page</a>&nbsp";  
}

//вычисляем масимальную страницу

$max = $rec / $N;
$page1 = ceil($max);
if($page < $page1) echo "<a>...</a>&nbsp<a href = red.php?page=$page1>$page1</a>&nbsp"; 
else if ($page > $page1) header("Location: ../admin/red.php?page=$page1"); /* Перенаправление браузера */
}
else echo join('', file('access.html'));
    
?>
<style>
    table{
        border-collapse: collapse;
    }
</style>


