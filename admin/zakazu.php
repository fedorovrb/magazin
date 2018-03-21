<?php
session_start();
if($_SESSION['auth'] == 1)
{


require '../config/config.php';


$result = mysql_query("SELECT * FROM oforml  ORDER BY number_zakaza DESC");
while($row = mysql_fetch_array($result))
{

    if($row[4] == 'Самовывоз')
    {
        echo "<p>Заказ № $row[0]</p><div id = \"ta\"><table cellpadding = \"10\" cellspacing = \"10\"><tr>";
        echo "<td>Фамилия</td><td>Имя</td><td>Номер телефона</td><td>Тип доставки</td><td>Статус</td></tr><tr>";
        echo "<td>$row[1]</td> <td>$row[2] <td>$row[3]</td> <td>$row[4]</td>";
        echo "<td><a href = \"status.php?num=$row[0]&status=$row[13]\">$row[13]</a></td>";
        echo "</tr></table>";
    }
    if($row[4] == 'Новая Почта')
    {
        echo "<p>Заказ № $row[0]</p><div id = \"ta\"><table cellpadding = \"10\" cellspacing = \"10\"><tr>";
        echo "<td>Фамилия</td><td>Имя</td><td>Номер телефона</td><td>Тип доставки</td><td>Город</td><td>Отделение Новой Почты</td><td>Статус</td></tr><tr>";
        echo "<td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> <td>$row[4]</td>";
        echo "<td>$row[5]</td> <td>$row[6]</td>";
       echo "<td><a href = \"status.php?num=$row[0]&status=$row[13]\">$row[13]</a></td>";
        echo "</tr></table>";
    }
    if($row[4] == 'Укрпочта')
    {
        echo "<p>Заказ № $row[0]</p><div id = \"ta\"><table cellpadding = \"10\" cellspacing = \"10\"><tr>";
        echo "<td>Фамилия</td><td>Имя</td><td>Номер телефона</td><td>Тип доставки</td><td>Город</td><td>Улица</td><td>Дом</td><td>Квартира</td><td>Почтовый индекс</td><td>Статус</td></tr><tr>";
        echo "<td>$row[1]</td> <td>$row[2] <td>$row[3]</td> <td>$row[4]</td>";
        echo "<td>$row[7]</td> <td>$row[8]</td><td>$row[9]</td><td>$row[10]</td><td>$row[11]</td>";
        echo "<td><a href = \"status.php?num=$row[0]&status=$row[13]\">$row[13]</a></td>";
        echo "</tr></table>";
    }
    if($row[4] == 'Другое')
    {
        echo "<p>Заказ № $row[0]</p><div id = \"ta\"><table cellpadding = \"10\" cellspacing = \"10\"><tr>";
        echo "<td>Фамилия</td><td>Имя</td><td>Номер телефона</td><td>Тип доставки</td><td>Как доставить</td><td>Статус</td></tr><tr>";
        echo "<td>$row[1]</td> <td>$row[2] <td>$row[3]</td> <td>$row[4]</td>";
        echo "<td>$row[12]</td>";
       echo "<td><a href = \"status.php?num=$row[0]&status=$row[13]\">$row[13]</a></td>";
        echo "</tr></table>";
    }

        $result1 = mysql_query("SELECT * FROM zakazi WHERE number_zakaza = '$row[0]'  ORDER BY number_zakaza DESC");
        echo "<table cellpadding = \"10\" cellspacing = \"10\"><tr>";
            echo "<td>ID товара</td><td>Наименование</td><td>Цвет</td><td>Размер</td><td>Количество</td><td>Цена</td></tr><tr>";
        $total = 0;
        while($row1 = mysql_fetch_array($result1))
        {
            $total += $row1[7];
            echo " <td>$row1[2]</td><td>$row1[3]</td><td><img src = \"../$row1[4]\" width = \"100\" height = \"100\"> <td>$row1[5]</td><td> $row1[6]</td><td> $row1[7] UAH</td><br></tr>";
        
        }
    echo "<tr><th>Всего к оплате: </th><th>$total UAH<td></tr></table></div><br>";

     ?>
        <style>
            #ta{
            background: #bbbbcc;
            }
            td{ text-align: center;}
            table{
                border: 1px;
                border-style: solid;
            }
        </style>
    <?

}
}
else echo join('', file('access.html'));
?>





