<html>
	<head>
		<title>Галерея</title>
		<link rel="shortcut icon" href="images/logo test.png" type="image/x-icon">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
    <!-- на весь экран -->
    <script src="js/jquery-2.0.2.min.js"></script>
          <script>
            $(document).ready(function(){
                //Скрыть PopUp при загрузке страницы    
                PopUpHide();
            });
            //Функция отображения PopUp
            function PopUpShow(src){
                var im = src;
                var img = document.createElement("IMG"); 
                img.src = im;
            
                img.setAttribute("id", "new");
                var sp2 = document.getElementById("new");
                var parentDiv = sp2.parentNode;

                // заменяем существующий элемент sp2 на созданный нами img
                parentDiv.replaceChild(img, sp2);
                document.getElementById("new").style.width="100%";
                document.getElementById("new").style.height="98%";
                $("#popup1").show();
            }
            //Функция скрытия PopUp
            function PopUpHide(){
                $("#popup1").hide();
                
            }
        </script> 
        <link href="css/gallery.css?<?=filemtime( 'css/gallery.css' )?>" rel="stylesheet">
   
    </head>
    <body>
    <div class="b-popup" id="popup1">
        <div class="b-popup-content">
           <a href = "javascript:PopUpHide()" style = "float: right;"><img src = "images/krestik.png" width="20px" height="20px" ></a>
            <img id = "new" width="5%">
        </div>
            </div>
    <div class = "al">
    <div class = "men">
        <h1>
        
         <div id="knop"><button onclick="history.back()"id="checkout1">Назад</button></div>Галерея</h1>
        </div>
    <div id = "cont">
<? 
require 'config/config.php';
    
$ot = mysql_query("SELECT img FROM gallery ORDER BY id DESC");
    
while ($row = mysql_fetch_array($ot)){
   
    echo "<div class = \"image\">";
    echo "<img id = \"ba\"src = \"gallery/$row[0]\" width = \"95%\" height = \"100%\" onclick = \"javascript:PopUpShow(src)\">";
    echo "</div>";
}
 ?>
       </div>
        </div> 
             
    </body>
</html>
