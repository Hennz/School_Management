<?php 

if(isset($_POST["submit"])){

	include'../moduls/TeacherClass.php';
	$username = $_POST['username'];
	
	$teacher = new teacher();
	if($teacher->deleteteacher($username))
	{
		echo'Data is deleted!';   
    }
    else 
    {
		echo 'Data is not deleted! the username is not correct.';
	}












}



?>