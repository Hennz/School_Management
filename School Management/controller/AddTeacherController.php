<?php 

if(isset($_POST["submit"])){

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

		$info['photoUrl'] = $upload->updateimg('file');
		
	//echo $info['photoUrl'];
    }
    else
	{		
		echo"error update img";
	}
	


	include'../moduls/TeacherClass.php';
	$info['id']="";
    $info['username']=$_POST['username'];
    $info['password'] = $_POST['password'];
    //$info['type'] = $_POST['type'];
    $info['fname'] = $_POST['fname'];
    $info['lname'] = $_POST['lname'];
	$info['phone'] = $_POST['phone'];
    $info['address'] = $_POST['address'];
    $info ['email'] = $_POST['email'];
	$info['age'] = $_POST['age'];
	
	$info2['id']="";
    $info2['department']=$_POST['department'];
	
	
	$teacher = new teacher();
	if($teacher->addteacher($info, $info2) == true)
	{
		echo'Data is stored!';   
    }
    else 
    {
		echo 'Data is not stored!. The username is already used.';
	}
   
   
}
























?>