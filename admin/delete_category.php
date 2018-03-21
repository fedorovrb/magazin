<?php
session_start();
if($_SESSION['auth'] == 1)
{
//удаляет товар

require '../config/config.php';

$id = $_GET['id'];

$delete = mysql_query("DELETE FROM categories WHERE id_category = $id");



if ($delete == true){
    header("Location: ../admin/create_category.php");
}

else {
    echo '<h1>Категория не была удалена</h1>' . mysql_error();
}
}
else echo join('', file('access.html'));