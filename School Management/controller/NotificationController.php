<?php 

	include_once '../moduls/CourseClass.php';
	error_reporting(E_ALL ^ E_STRICT);
	
if(isset($_GET['submit']))
{
	$info['content'] = $_GET['content'];
	$info['course_id'] = $_GET['course_id'];
	//$info['teacher_id'] = $_GET['teacher_id'];
	
/*	echo $info['content'];
	echo $info['course_id'];
	echo $info['teacher_id'];
*/	
	$course = new course();
	$notify = $course->sendcoursenews($info);
	if($notify)
	{
		echo'Data is sent!';   
    }
    else 
    {
		echo 'Data is not sent!.';
	}
}

//david


if(isset($_POST['submit1']))
{
	//$info['content'] = $_GET['content'];
	
    if (isset($_FILES)) {
        $file['files']=$_FILES["files"];
		 
       
        $allowedExts = array("docs", "pdf","txt","doc");
        $destination = "../uploads/files/";
        $maxSize=3024000;
        include '../moduls/UploadClass.php';

        $upload = new upload($file, $allowedExts, $maxSize, $destination);
        $upload->uploadFile();
        $info['assURL']= $upload->getFileUrl();
		$info['course_id'] = $_POST['course_id'];
		//echo $info['assURL'];  
    } 
	
	$course = new course();
	$notify = $course->sendcourseassignment($info);
	if($notify)
	{
		echo'Assignment is sent!';   
    }
    else 
    {
		echo 'Assignment is not sent!.';
	}
}










?>