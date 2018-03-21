<?php
session_start();
if($_SESSION['auth'] == 1)
{
    
require '../config/config.php';

$cat = $_POST['nam'];
$razdel = $_POST['cat']; 
    

$qw = mysql_query("INSERT INTO categories(name_category, razdel) VALUES ('$cat', '$razdel')");

if ($qw == true)
{ 

    header("Location: ../admin/create_category.php");
}

else{
    echo mysql_error();
}

 }
else echo join('', file('access.html'));   