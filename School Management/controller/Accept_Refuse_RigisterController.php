<?php 

include_once '../moduls/AdminClass.php';

if(isset($_POST['select']))
{
	
    $st_id=$_POST['st_id'];
	//$info['course_id']=@$_POST['course_id'];
	//$id=@$_POST['id'];
	//echo $st_id;
	$admin = new admin();
	$accept = $admin->AcceptStudentParentCourses($st_id);
	
	//$add=new add($info,'student_course');
    if($accept)
    {  	
		echo'<script type="text/javascript">alert("The register is accepted! ");</script>';
  
    }
	


}


if(isset($_POST['drop']))
{
	$st_id=$_POST['st_id'];
	//$info['course_id']=@$_POST['course_id'];
	
	$admin = new admin();
	$refuse= $admin->RefuseStudentParentCourses($st_id);
	//$add=new add($info,'student_course');
    if($refuse)
    {  	
		echo'<script type="text/javascript">alert("The register is removed from list! ");</script>';
  
    }
	
}
















?>