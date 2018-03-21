<?php

session_start();
if($_SESSION['auth'] == 1)
{ ?>
    
<!doctype html>


<html>
	<head>
		<title>Добавление товара</title>
		<meta charset="UTF-8">
	</head>
    <form action = "complete_razdel.php" method = "post" enctype="multipart/form-data">
	    <table width = "900px" cellpadding = 10>
        <tr>
            <td><a href = "red.php?page=1"><h1>Вернуться к просмотру товаров</h1></a></td>
            
        </tr>
        <tr>
	            <td>Введите раздел:</td>
	            <td><input type = "text" size="50" name = "razdel"></td>
                <td><input type = "submit" value = "Добавить"></td>
	        </tr> 
	         
	        <tr>
	            <td><h4>Все доступные разделы</h4></td>
            </tr>
	
<?php
    
    require '../config/config.php';
    
    $ia = mysql_query('SELECT * FROM razdelu ORDER BY id_category DESC');
    
    while ($a = mysql_fetch_array($ia))
    {
        echo "<tr><td>Раздел:<h4>" .$a[1] ."</h4>";
        echo "<a href = \"../admin/delete_razdel.php?id=$a[0]\"><img src=\"../images/krestik.png\" alt = \"Удалить\" width = \"20\" height = \"20\"</a>";
        echo "</td></tr>";
    }
    echo "</table>";
?>


	        
	    </table>
	    </form> 
	<body>
	</body>
	<?php
}
else echo join('', file('access.html'));	