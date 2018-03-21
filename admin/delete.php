<?php

session_start();
if($_SESSION['auth'] == 1)
{
//удаляет товар

require '../config/config.php';

$id = $_GET['id'];

$delete = mysql_query("DELETE FROM content WHERE id = $id");

$delete1 = mysql_query("DELETE FROM images WHERE id_content = $id");

if (($delete && $delete1) == true){
   
    header("Location: ../admin/red.php");
}

else {
    echo '<h1>Товар не был удален</h1>' . mysql_error();
}
}
else echo join('', file('access.html'));

