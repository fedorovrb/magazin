<?php
require 'config/config.php';

$radio = $_POST['dost'];
$data = $_POST['data'];
$status = "Не обработан";



$data = json_decode($data, true);





if ($radio == 1)
{
    $value = array_values($data);
$count = count($value);
    
    $surname = $_POST['f'];
    $name = $_POST['i'];
    $phone = $_POST['n'];
    $gorod = $_POST['gorod']; 
    $nomernp = $_POST['nomernp'];
    $deliver = "Новая Почта";
    mysql_query("INSERT INTO oforml (surname, name, phone, type_deliv, city_np, otedel_np, status)  VALUES('$surname', '$name', '$phone', '$deliver', '$gorod', '$nomernp', '$status')") or die(mysql_error());
    
    $result = mysql_query('SELECT number_zakaza FROM oforml  ORDER BY number_zakaza DESC LIMIT 1'); // запрос на выборку
    $row = mysql_fetch_row($result);
    $nomer = $row[0];
    
     for($i = 0; $i < $count; $i++)
    {
        mysql_query("INSERT INTO zakazi VALUES('', '$nomer', '".$value[$i][0]."','".$value[$i][1]."', '".$value[$i][2]."', '".$value[$i][3]."', '".$value[$i][4]."', '".$value[$i][5]."')") or die(mysql_error());// добавляем данные в бд   
    }
  
}

if ($radio == 2)
{
    $value = array_values($data);
$count = count($value);
   
    $surname = $_POST['f'];
    $name = $_POST['i'];
    $phone = $_POST['n'];
    $gorodd = $_POST['gorodd'];
    $street = $_POST['street'];
    $house = $_POST['house'];
    $apart = $_POST['apart'];
    $index = $_POST['index'];
    $deliver = "Укрпочта";
    mysql_query("INSERT INTO oforml (surname, name, phone, type_deliv, city_up, street_up, house_up, apart_up, index_up, status)  VALUES('$surname', '$name', '$phone', '$deliver', '$gorodd', '$street', '$house', '$apart', '$index', '$status')") or die(mysql_error());
    
    $result = mysql_query('SELECT number_zakaza FROM oforml  ORDER BY number_zakaza DESC LIMIT 1'); // запрос на выборку
    $row = mysql_fetch_row($result);
    $nomer = $row[0];
     for($i = 0; $i < $count; $i++)
    {
        mysql_query("INSERT INTO zakazi VALUES('', '$nomer', '".$value[$i][0]."','".$value[$i][1]."', '".$value[$i][2]."', '".$value[$i][3]."', '".$value[$i][4]."', '".$value[$i][5]."')") or die(mysql_error());// добавляем данные в бд   
    }
}

if ($radio == 3)
{
    $value = array_values($data);
$count = count($value);
    
    $surname = $_POST['f'];
    $name = $_POST['i'];
    $phone = $_POST['n'];
    $deliver = "Самовывоз";
     mysql_query("INSERT INTO oforml (surname, name, phone, type_deliv, status)  VALUES('$surname', '$name', '$phone', '$deliver', '$status')") or die(mysql_error());
    
    $result = mysql_query('SELECT number_zakaza FROM oforml  ORDER BY number_zakaza DESC LIMIT 1'); // запрос на выборку
    $row = mysql_fetch_row($result);
    $nomer = $row[0];
    
     for($i = 0; $i < $count; $i++)
    {
        mysql_query("INSERT INTO zakazi VALUES('', '$nomer', '".$value[$i][0]."','".$value[$i][1]."', '".$value[$i][2]."', '".$value[$i][3]."', '".$value[$i][4]."', '".$value[$i][5]."')") or die(mysql_error());// добавляем данные в бд   
    }
}

if ($radio == 4)
{
    $value = array_values($data);
$count = count($value);
    
    $surname = $_POST['f'];
    $name = $_POST['i'];
    $phone = $_POST['n'];
    $tex = $_POST['tex'];
    $deliver = "Другое";
     mysql_query("INSERT INTO oforml (surname, name, phone, type_deliv, els, status)  VALUES('$surname', '$name', '$phone', '$deliver', '$tex', '$status')") or die(mysql_error());
    
    $result = mysql_query('SELECT number_zakaza FROM oforml  ORDER BY number_zakaza DESC LIMIT 1'); // запрос на выборку
    $row = mysql_fetch_row($result);
    $nomer = $row[0];
    
      for($i = 0; $i < $count; $i++)
    {
        mysql_query("INSERT INTO zakazi VALUES('', '$nomer', '".$value[$i][0]."','".$value[$i][1]."', '".$value[$i][2]."', '".$value[$i][3]."', '".$value[$i][4]."', '".$value[$i][5]."')") or die(mysql_error());// добавляем данные в бд   
    }
}

header("Location: com.php"); /* Перенаправление браузера */



   