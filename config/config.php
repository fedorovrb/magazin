<?php

$host = "localhost"; // адрес сервера
$user = "root";
$password = "";
$database = "magazin";

/*$host = "mysql.zzz.com.ua"; // адрес сервера
$user = "id3904376_adminc";
$password = "87sw9C3z";
$database = "fedorovd"; */

$logins = "loginilvDRsfr2015";
$passwords = "87sw9C3z";


$link = mysql_connect($host, $user, $password) 
    or die("Ошибка " . mysqli_error($link));
$db = mysql_select_db($database, $link);

mysql_set_charset("utf-8");
mysql_query("SET NAMES utf8");

?>
