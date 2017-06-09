<?php

if(isset($_POST["submit"])){


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
		$info['photoUrl'] = $upload->updateimg('file');
		$info['photoUrl1'] = $upload1->updateimg('file1');

	//	echo $st_info['photoUrl']; echo'<br>';
	//	echo $st_info['photoUrl1'];

	}
	 else
	{		
		echo"error update img";
	}


	$info['id']="";
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
	
	
	$info2['id']="";
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
	
	include '../moduls/StudentClass.php';
	include '../moduls/ParentClass.php';
	//$student = new student($info);
	$parent = Parents::parentsinfo($info2['occupation']);
	$parent->p_info($info2);
	$student = student::add($info, $parent);
	//$student->setParent($parent);

	if($student)
	{
		echo'Data is stored!';   
    }
    else 
    {
		echo 'Data is not stored!. The username is already used.';
	}
   
   
}
	
	
?>