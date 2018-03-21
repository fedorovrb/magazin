<?php
    session_start();
if($_SESSION['auth'] == 1)
{
?>
<!doctype html>

<html>
	<head>
		<title>Добавление товара</title>
		<meta charset="UTF-8">
		<!-- редактор текста -->
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	</head>
    <form action = "complete.php" method = "post" enctype="multipart/form-data">
	    <table width = "900px" cellpadding = 10>
	        <tr>
	            <td>Название товара:</td>
	            <td><input type ="text" size="50" name = "nazv"></td>
	        </tr>
	        <tr>
	            <td>Категория:</td>
	            <td><select name = "categ" size="1">
        <?php
                    
	           require '../config/config.php';
    
               $ia = mysql_query('SELECT * FROM categories ORDER BY id_category DESC');
    
                    $i = 0;
              while ($a = mysql_fetch_array($ia))
              {
                  echo "<option value = \"$a[1]\">". $a[1] ."</option>";
              }
        ?>
        </select></td>
	        </tr>
	        
	       
	        <tr>
	            <td>Описание:</td>
                <td><textarea rows="10" cols="50" name = "descr"></textarea></td>
	        </tr>
	        <tr>
	            <td>Цена:</td>
                <td><input type="text" size="50" name = "tsena"></td>
	        </tr>
	        <tr>
                <td>Фотография:<br><br>(Фото, которое вы<br> выберете первым, <br>будет заглавным)</td>
	            <td>
                    <input type = "file" name = "myfile[]"><p onclick = "doad()" id = "xyz">Загрузить еще одну фотографию</p>
	            </td>
	        </tr>
	        <tr>
                <td></td>
                <td><input type="submit" value = "Добавить товар"></td>
	        </tr>    
	    </table>
	    </form> 
	<body>
	</body>
</html>
<?php
    }
else echo join('', file('access.html'));

    ?>
<script>
    function doad(){
        // Создаем новый <input>
        var sp1=document.createElement('input');
        sp1.type = 'file';
        sp1.name = 'myfile[]';
        // Получаем ссылку на элемент, перед которым мы хотим вставить sp1
        var sp2 = document.getElementById("xyz");
        //Получаем ссылку на родителя sp2
        var parentDiv = sp2.parentNode;

        // Вставляем sp1 перед sp2
        parentDiv.insertBefore(sp1, sp2);
        
        var br = document.createElement('br');
        var parentDiv = sp1.parentNode
        // Вставляем sp1 перед sp2
        parentDiv.insertBefore(br, sp1);
        
}
</script>

