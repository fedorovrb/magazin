<?
session_start();
if($_SESSION['auth'] == 1)
{
    require '../config/config.php';
    
    $id = $_GET['id'];
    
    $delete = mysql_query("DELETE FROM gallery WHERE id = $id");



    if ($delete == true){
        header("Location: ../admin/create_gallery.php");
    }

    else {
        echo '<h1>Ошибка удаления изображения</h1>' . mysql_error();
    }
    
}

else echo join('', file('access.html'));