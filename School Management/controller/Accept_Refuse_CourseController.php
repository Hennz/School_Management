<?php

include_once '../moduls/StudentClass.php';
include_once '../moduls/courseClass.php';


if(isset($_POST['select']))
{
	
    $info['st_id']=@$_POST['st_id'];
	$info['course_id']=@$_POST['course_id'];
	//$id=@$_POST['id'];
	
	$course = new course();
	$student = new student();
	$accept = $student->AcceptnewSelectedCourses($info , $course);
	//$add=new add($info,'student_course');
    if($accept)
    {  	
		echo'<script type="text/javascript">alert("The course is accepted! ");</script>';
  
    }
	
	
	
}

if(isset($_POST['drop']))
{
	$info['st_id']=@$_POST['st_id'];
	$info['course_id']=@$_POST['course_id'];
	
	$course = new course();
	$student = new student();
	//$admin = new admin();
	//$delete=new Delete("student_course_unreg");
	$refuse = $student->RefusenewSelectedCourses($info , $course);
       //$delete->deleteRecordByID1($id);
       if($refuse)
       {
		   echo'<script type="text/javascript">alert("The course is refused and removed from list! ");</script>';
			
           
       }
	   		//   header ("location: http://localhost/SW2%20Project/Project/GUI/Version%201/graf_73645_voyage/voyage/views/adminpage.php");

}



if(isset($_POST['select1']))
{
	//echo 'hello';
    $info['st_id']=@$_POST['st_id'];
	$info['course_id']=@$_POST['course_id'];
	//$id=@$_POST['id'];
	
	$course = new course();
	$student = new student();
	$accept = $student->AcceptnewDropedCourses($info , $course);
	//$add=new add($info,'student_course');
    if($accept)
    {  	
		echo'<script type="text/javascript">alert("The course is Droped! ");</script>';
  
    }
	
	
	
}



if(isset($_POST['drop1']))
{
	$info['st_id']=@$_POST['st_id'];
	$info['course_id']=@$_POST['course_id'];
	
	$course = new course();
	$student = new student();
	//$admin = new admin();
	//$delete=new Delete("student_course_unreg");
	$refuse = $student->RefusenewDropedCourses($info , $course);
       //$delete->deleteRecordByID1($id);
       if($refuse)
       {
		   echo'<script type="text/javascript">alert("The course is refused to be droped and removed from list! ");</script>';
			
           
       }
	   		//   header ("location: http://localhost/SW2%20Project/Project/GUI/Version%201/graf_73645_voyage/voyage/views/adminpage.php");

}




?>