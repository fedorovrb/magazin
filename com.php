<html>
  <head>
      <title>Успешно</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="images/logo test.png" type="image/x-icon">
       <link href="css/cart.css?<?=filemtime( 'css/product.css' )?>" rel="stylesheet">
       <link href="css/catalog.css?<?=filemtime( 'css/product.css' )?>" rel="stylesheet">
  </head>
   <body>
   <div class="body">
    <div id = "menu">
      <a href = "index.php"><div id = "logo"><span style = "font-size: 28pt;">M</span>ILLA <span style = "font-size: 28pt;">S</span>HILLA</div></a>
</div>
<div class="hj" style = "width: 100%; text-align: center; margin-top: 163px;">
<h2>Заказ был успешно оформлен</h2>
<h2>Наш оператор свяжется с вами в ближайшее время</h2>
<a style = "text-decoration-line: none;" href = "index.php"><h2 style = "color: red;">Вернуться на главную</h2></a>
</div>
<script>
    localStorage.removeItem('cart');
    localStorage.setItem('cif', 0);
   
</script>
   </div>
    </body>
</html>