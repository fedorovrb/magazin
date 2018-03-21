<?php
session_start();
if($_SESSION['auth'] == 1)
{
    require '../config/config.php';
    $num = $_GET['num'];
    $status = $_GET['status'];
    
    if($status == "Не обработан")
    {
         $upload = mysql_query ("UPDATE oforml SET status = 'Обработан' WHERE number_zakaza = $num") or die (mysql_error());
    }
    else if($status == "Обработан")
    {
        $upload = mysql_query ("UPDATE oforml SET status = 'Не обработан' WHERE number_zakaza = $num") or die (mysql_error());
    }
    header("Location: ../admin/zakazu.php"); /* Перенаправление браузера */
    
}
else echo join('', file('access.html'));

