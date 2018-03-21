<?php
session_start();
if($_SESSION['auth'] == 1)
{
    
require '../config/config.php';


$razdel = $_POST['razdel']; 
    

$qw = mysql_query("INSERT INTO razdelu(razdel) VALUES ('$razdel')");

if ($qw == true)
{ 

    header("Location: ../admin/create_razdel.php");
}

else{
    echo mysql_error();
}

 }
else echo join('', file('access.html'));   