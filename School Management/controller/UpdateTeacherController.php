<?php 

		include'../moduls/TeacherClass.php';
		
if(isset($_GET["submit"])){
	session_start();
	$username = $_GET['t_username'];
	//echo $_SESSION['username'];
	//$parent = new Parents();
	$teacher = new teacher();
	//$student->setParent($parent);
	$row = $teacher->displayteacherdata($username);
	//$row1 = $student->displaystudentdata($username);
	if($_SESSION['username'] == $username)
	{
		if($row != false)
		{
			include'../views/UpdateTeacherPageView.php';
		}
		else
		{
			echo 'The username is incorrect!';
		}
	}
	else
	{
		if($row != false)
		{
			include'../views/UpdateTeacherPageViewadmin.php';
		}
		else
		{
			echo 'The username is incorrect!';
		}
	}
}

elseif(isset($_POST["submit1"])){
	
	if(isset($_FILES))
    {
		
		$file = $_FILES["file"];
		//echo $file;
       $allowedExts = array("jpg", "png");
         $maxSize = 1024000;
           include '../moduls/UploadClass.php';
            $destination = "../uploads/stdimg/";
           $upload = new upload($file, $allowedExts, $maxSize, $destination);
    /*     if($upload->updateimg()) {
        // header("location: http://localhost:3333/David%20last%20updates/PhpProject1/PhpProject1/view/studentpage.php");
		}
		 
         else echo"error ";
    */

		$info['photoUrl1'] = $upload->updateimg('file');
		
	//echo $info['photoUrl'];
    }
    else
	{		
		echo"error update img";
	}

	$info['id']=$_POST['t_id'];
    $info['username']=$_POST['t_username'];
    $info['password'] = $_POST['t_password'];
    //$info['type'] = $_POST['type'];
    $info['fname'] = $_POST['t_fname'];
    $info['lname'] = $_POST['t_lname'];
	$info['phone'] = $_POST['t_phone'];
    $info['address'] = $_POST['t_address'];
    $info['email'] = $_POST['t_email'];
	$info['age'] = $_POST['t_age'];
	
	$info['department']=$_POST['t_department'];
    $info['photoUrl']=$_POST['t_photoUrl'];
	
	$teacher = new teacher();
	
	$teach = $teacher->updateteacher($info);
	
	if($teach)
	{
		echo'Data is updated!';
    }
    else 
    {
		echo 'Data is not updated!. The username is already used.';
	}
	

	
}













elseif(isset($_POST["sub1"])){
	
	if(isset($_FILES))
    {
		
		$file = $_FILES["file"];
		//echo $file;
       $allowedExts = array("jpg", "png");
         $maxSize = 1024000;
           include '../moduls/UploadClass.php';
            $destination = "../uploads/stdimg/";
           $upload = new upload($file, $allowedExts, $maxSize, $destination);
    /*     if($upload->updateimg()) {
        // header("location: http://localhost:3333/David%20last%20updates/PhpProject1/PhpProject1/view/studentpage.php");
		}
		 
         else echo"error ";
    */

		$info['photoUrl1'] = $upload->updateimg('file');
		
	//echo $info['photoUrl'];
    }
    else
	{		
		echo"error update img";
	}

	$info['id']=$_POST['t_id'];
    $info['username']=$_POST['t_username'];
    $info['password'] = $_POST['t_password'];
    //$info['type'] = $_POST['type'];
    $info['fname'] = $_POST['t_fname'];
    $info['lname'] = $_POST['t_lname'];
	$info['phone'] = $_POST['t_phone'];
    $info['address'] = $_POST['t_address'];
    $info['email'] = $_POST['t_email'];
	$info['age'] = $_POST['t_age'];
	
	$info['department']=$_POST['t_department'];
    $info['photoUrl']=$_POST['t_photoUrl'];
	
	$teacher = new teacher();
	
	$teach = $teacher->updateteacher1($info);
	
	if($teach)
	{
		echo'Data is updated!';   
		//header("location: http://localhost:3333/School%20Management/views/AdminPageView.php");

    }
    else 
    {
		echo 'Data is not updated!. The username is already used.';
	}
	

	
}









?>