<?
session_start();
if($_SESSION['auth'] == 1)
{
    require '../config/config.php';
    
   $filesDir = '../gallery/';

  
    if(is_uploaded_file($_FILES["myfile"]["tmp_name"]))
    {
        move_uploaded_file($_FILES["myfile"]["tmp_name"], "$filesDir".$_FILES["myfile"]["name"]);
        
        $img = $_FILES["myfile"]["name"];
        
        mysql_query("INSERT INTO gallery(img) VALUES('$img')") or die(mysql_error());// добавляем данные в бд
        header("Location: ../admin/create_gallery.php");
        
    } 
    else die();

    
}
    else echo join('', file('access.html'));
?>