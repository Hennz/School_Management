<?php

if(isset($_POST["submit1"]))
{
include'../moduls/user.php';
include'../moduls/subject.php';
include'send.php';

$servername = "localhost";
		$username = "root";
		$password = "";
		$dbName = 'school_db';
		
		$conn = mysqli_connect($servername, $username, $password, $dbName);
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
		session_start();
		$user = $_SESSION['sess_user'];
		
		//echo $user;
		
		$sql = "INSERT INTO student_course (s_username, cid)
		VALUES ('".$user."', 1)";
		
		if ($result=mysqli_query($conn, $sql)) 
		{
			echo "Database created successfully";
			
			$teacher = new subject1();
			@$teacher = $sub;
			//$student = new user1($teacher);
			
		}
		else 
		{
			echo "Error: ";
		}




}



?>