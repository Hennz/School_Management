<?php

if(isset($_POST["submit1"]))
{

	if(isset($_FILES))
    {
		
		@$file = $_FILES["file"];
		@$file1 = $_FILES["file1"];
       $allowedExts = array("jpg", "png");
         $maxSize = 1024000;
           include '../moduls/UploadClass.php';
            $destination = "../uploads/stdimg/";
           $upload = new upload($file, $allowedExts, $maxSize, $destination);
		   $upload1 = new upload($file1, $allowedExts, $maxSize, $destination);
		$st_info['photoUrl'] = $upload->updateimg('file');
		$st_info['photoUrl1'] = $upload1->updateimg('file1');

	//	echo $st_info['photoUrl']; echo'<br>';
	//	echo $st_info['photoUrl1'];

	}
	 else
	{		
		echo"error update img";
	}
	
	//get student info from view into st_info array
    $st_info['username'] = $_POST['s_username'];
    $st_info['password'] = $_POST['s_password'];
    $st_info['fname']=$_POST['s_fname'];
    $st_info['lname']=$_POST['s_lname'];
    $st_info['phone']=$_POST['s_phone'];
	$st_info['address']=$_POST['s_address'];
	$st_info['level']=$_POST['s_level'];
	$st_info['email']=$_POST['s_email'];
	$st_info['age']=$_POST['s_age'];
	
	//get parent info from view into pr_info array
	$pr_info['username'] = $_POST['p_username'];
    $pr_info['password'] = $_POST['p_password'];
    $pr_info['fname']=$_POST['p_fname'];
    $pr_info['lname']=$_POST['p_lname'];
    $pr_info['phone']=$_POST['p_phone'];
	$pr_info['address']=$_POST['p_address'];
	$pr_info['occupation']=$_POST['p_occupation'];
	$pr_info['email']=$_POST['p_email'];
	$pr_info['age']=$_POST['p_age'];
	
	
	//create object from student class
	include '../moduls/StudentClass.php';
	include '../moduls/ParentClass.php';
	//$student = new student($st_info);  
	$parent = Parents::parentsinfo($pr_info['occupation']);
	$parent->p_info($pr_info);
	//$parent = new Parents($pr_info);
	$student = student::registers($st_info, $parent);
	//$student->setParent($parent);
	
/*	
	$s_level = $student->getLevel();
	$s_username = $student->getUsername();
	echo 'yes ';
	echo $s_level;
	echo $s_username;
	
	$p_occupation = $parent->getOccupation();
	$p_username = $parent->getUsername();
	echo 'no ';
	echo $p_occupation;
	echo $p_username;
*/
/*
	$s_p_password = $student->Register1();
	echo 'what ';
	echo $s_p_password;
*/	
	
	
	if($student)
	{
		echo 'Data Stored!';
	}
	else
	{
		echo 'Data is not stored!  The Username is already used before.';
	}

	
	
	
}


?>