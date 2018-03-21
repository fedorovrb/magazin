<?
session_start();
if($_SESSION['auth'] == 1)
{
    ?>
<h1>Добавление изображения в галерею</h1>
<form action = "complete_gallery.php" method = "post" enctype="multipart/form-data">
    
<input type = "file" name = "myfile">
<input type = "submit">
</form>


<? 
    require '../config/config.php';
    
$ot = mysql_query("SELECT * FROM gallery ORDER BY id DESC");
    
while ($row = mysql_fetch_array($ot)){
   
    echo "<img src = \"../gallery/$row[1]\" width = \"80px\" height = \"120px\">";
     echo "<a href = \"../admin/delete_gallery.php?id=$row[0]\"><img src=\"../images/krestik.png\" alt = \"Удалить\" width = \"20\" height = \"20\"></a>";

}
    
    
}
    else echo join('', file('access.html'));
?>