<?php 
	//echo $_SESSION['username'];
	include'../moduls/StudentClass.php';
	include '../moduls/ParentClass.php';
	
if(isset($_GET["submit"])){
	$username = $_GET['s_username'];
	//$parent = new Parents();
	$student = new student();
	//$student->setParent($parent);
	$row = $student->displaystudentdata($username);
	$row1 = $student->displaystudentdata($username);	
	session_start();
	if($_SESSION['username'] != $username)
	{
		if($row != false)
		{
		include'../views/UpdateStudentPageView.php';
		}
		else
		{
			echo 'The username is incorrect.';
		}
	}
	else
	{
		include'../views/UpdateStudentProfilePageView.php';
	}
	
/*	if($student)
	{
		echo'Data is deleted!';   
    }
    else 
    {
		echo 'Data is not deleted! the username is not correct.';
	}
*/


}


elseif(isset($_POST["submit1"])){
	
	
	if(isset($_FILES))
    {
		
		$file = $_FILES["file"];
		$file1 = $_FILES["file1"];
       $allowedExts = array("jpg", "png");
         $maxSize = 1024000;
           include '../moduls/UploadClass.php';
            $destination = "../uploads/stdimg/";
           $upload = new upload($file, $allowedExts, $maxSize, $destination);
		   $upload1 = new upload($file1, $allowedExts, $maxSize, $destination);
		$info['photoUrl'] = $upload->updateimg('file');
		$info['photoUrl1'] = $upload1->updateimg('file1');

	//	echo $st_info['photoUrl']; echo'<br>';
	//	echo $st_info['photoUrl1'];

	}
	 else
	{		
		echo"error update img";
	}
	
	

	$info['id']=$_POST['s_id'];

	
    $info['username']=$_POST['s_username'];
    $info['password'] = $_POST['s_password'];
    //$info['type'] = $_POST['type'];
    $info['fname'] = $_POST['s_fname'];
    $info['lname'] = $_POST['s_lname'];
	$info['phone'] = $_POST['s_phone'];
    $info['address'] = $_POST['s_address'];
    $info['email'] = $_POST['s_email'];
	$info['age'] = $_POST['s_age'];
	
  //$info2['id']="";
    $info['level']=$_POST['s_level'];
	$info['s_photoUrl'] = $_POST['s_photoUrl'];
	$info['p_photoUrl'] = $_POST['p_photoUrl'];


	
	
	$info2['id']=$_POST['p_id'];
    $info2['username']=$_POST['p_username'];
    $info2['password'] = $_POST['p_password'];
    //$info['type'] = $_POST['type'];
    $info2['fname'] = $_POST['p_fname'];
    $info2['lname'] = $_POST['p_lname'];
	$info2['phone'] = $_POST['p_phone'];
    $info2['address'] = $_POST['p_address'];
    $info2['email'] = $_POST['p_email'];
	$info2['age'] = $_POST['p_age'];
	
  //$info2['id']="";
    $info2['occupation']=$_POST['p_occupation'];
	
	$parent = Parents::parentsinfo($info2['occupation']);
	$parent->p_info($info2);
	$student = student::update($info, $parent);
	
	if($student)
	{
		echo'Data is updated!';   
    }
    else 
    {
		echo 'Data is not updated!. The username is already used.';
	}
	

}

elseif(isset($_POST["sub"])){
	
	
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
		//echo $info['photoUrl1'];
	//echo $info['photoUrl'];
    }
    else
	{		
		echo"error update img";
	}
	
	
	
	
	
	$info['id']=$_POST['s_id'];
	$info['p_id']=$_POST['p_id'];

    $info['username']=$_POST['s_username'];
    $info['password'] = $_POST['s_password'];
    //$info['type'] = $_POST['type'];
    $info['fname'] = $_POST['s_fname'];
    $info['lname'] = $_POST['s_lname'];
	$info['phone'] = $_POST['s_phone'];
    $info['address'] = $_POST['s_address'];
    $info['email'] = $_POST['s_email'];
	$info['age'] = $_POST['s_age'];
	$info['photoUrl'] = $_POST['s_photoUrl'];

	
  //$info2['id']="";
    $info['level']=$_POST['s_level'];


	$student = new student();
	
	$st = $student->updatestudentprofile($info);
	
	if($st)
	{
		echo'Data is updated!';   
    }
    else 
    {
		echo 'Data is not updated!. The username is already used.';
	}
	
	
	
}



?>