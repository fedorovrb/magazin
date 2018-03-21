<?php

require "../config/config.php";

$log = $_REQUEST['login'];
$pas = $_REQUEST['password'];

if (!isset($log)){
		// выводим форму входа на сайт
		echo join('', file('index.html'));
	}
else{
		
			
			if(($log === $logins) && ($pas === $passwords)){
				
                
				session_start();
				// устанавливаем значения переменных
				$_SESSION['auth'] = 1;
				header("Location: ../admin/red.php?page=1");
			}
		else echo join('', file('access.html'));
}
	
 
?>