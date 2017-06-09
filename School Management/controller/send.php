<?php 

if(isset($_POST["submit"])){
	include'../moduls/subject.php';
	if(!empty($_POST['send'])) 
	{
			$send=$_POST['send'];
			
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbName = 'school_db';
		
		$conn = mysqli_connect($servername, $username, $password, $dbName);
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
		
		/*$sub = new subject1();
		$sub->SetDesc($send);*/
		
	}
}



?>