<?php
session_start();
if($_SESSION['auth'] == 1)
{
    
require '../config/config.php';

$id = $_GET['id'];

    $result = mysql_query("SELECT * FROM content WHERE id = $id");

    while ($row = mysql_fetch_array($result)){

?>


<!doctype html>

<html>
	<head>
		<title>Редактирование товара</title>
		<meta charset="UTF-8">
		<!-- редактор текста -->
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	</head>
    <form action = "up.php" method = "post" enctype="multipart/form-data">
	    <table width = "900px" cellpadding = 10>
	        <tr>
	            <td>Название товара:</td>
	            <td><input type ="text" size="50" name = "nazv" value = "<?php echo $row[1]?>"></td>
	        </tr>
	        <tr>
	            <td>Категория:</td>
                <td><select name = "categ">
            <?php
	           require '../config/config.php';
    
               $ia = mysql_query('SELECT * FROM categories ORDER BY id_category DESC');
    
                    $i = 0;
                                                
              while ($a = mysql_fetch_array($ia))
              {
                  echo "<option value = ". $a[1] .">". $a[1] ."</option>";
              }
        ?></select></td>
	        </tr>
	        <tr>
	            <td>Описание:</td>
                <td><textarea rows="10" cols="50" name = "descr"><?php echo $row[3]?></textarea></td>
	        </tr>
	        <tr>
	            <td>Цена:</td>
                <td><input type="text" size="50" name = "tsena" value = "<?php echo $row[4]?>"></td>
	        </tr>
	            <td>ID</td>
                <td><input id = "a" name = "id" value = "<?php echo $id;}?>"></td>
	        <tr>
                <td></td>
                <td><input type = "submit" value="Сохранить"></td>
	        </tr>    
	    </table>
	    </form> 
	<body>
	</body>
</html>
<?php } else echo join('', file('access.html')); ?>
<style>
    #a{
        pointer-events: none;
        background: gray;
    }
    </style>

