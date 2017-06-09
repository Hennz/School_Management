<?php
@session_start();
if($_SESSION['username']){
if(isset($_POST['select']))
{
	include_once'../moduls/StudentClass.php';
	$id = $_SESSION['id'];
	$student =new student();
	$count = $student->getcount('student_course_unreg',$id);
	$count1 = $student->getcount('student_course',$id);
	
	if(($count + $count1) < 6 )
	{
		$info['st_id']=$_SESSION['id'];
		$info['course_id']=@$_POST['course_id'];
		
		$register = $student->RegisterSelectedCourses($info);
		
		//$add=new add($info,'student_course_unreg');
		if($register )
		{  echo'<script type="text/javascript">alert("The course is selected ");</script>';
	  /*include '../views/Reservation.php';*/
		}
	}
	else
	{
		echo'<script type="text/javascript">alert("You have already chose 6 subject ! ");</script>';
	}
   
}


if(isset($_POST['drop']))
   {
	   	include_once'../moduls/StudentClass.php';

		$info['st_id']=$_SESSION['id'];
		$info['course_id']=@$_POST['course_id'];
	   
	   
	   $student =new student();
	   $register = $student->RegisterDropSelectedCourses($info);
	   
	   if($register )
		{  
			echo'<script type="text/javascript">alert("The request of dropping course is done! ");</script>';
		}
      /* $delete=new Delete("student_course_unreg");
       $delete->deleteRecordByID($info);
       if($delete)
       {echo'<script type="text/javascript">alert(" Delete is done! ");</script>';
        include '../views/Reservation.php';
           */
}
   

   
   
   
   
   
   
   
   
   
   
   }else 
{
    header("location: http://localhost/shoolsite/views/login.php");
    
}