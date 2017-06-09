<?php 

if(isset($_POST["submit"])){

	include'../moduls/StudentClass.php';
	$username = $_POST['s_username'];

	
	//$student = new student();
	//$student = student::delete();
	$student = student::delete($username);
	if($student)
	{
		echo'Data is deleted!';   
    }
    else 
    {
		echo 'Data is not deleted! the username is not correct.';
	}
	
	
	
	
	
	
	
	
	
}



?>