<?php 

if(isset($_POST["submit"])){
		include'../moduls/UsersClass.php';
		$user = new users();
		$user->logout();	
		}
		









?>