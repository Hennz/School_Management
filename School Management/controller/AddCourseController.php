<?php

if(isset($_POST["submit"])){
    $info['id']="";
    $info['course_name']=$_POST['course_name'];
    $info['course_code'] = $_POST['course_code'];
    $info['description'] = $_POST['description'];
	$info['hours'] = $_POST['hours'];
	$info['teacher_username'] = $_POST['teacher_username'];


    
     include '../moduls/CourseClass.php';
	 $course = new course();
	 
	 

   if($course->addcourse($info))
   {
	   echo 'Course is added successfully.';
   }
   else
   {
	   echo 'Data is not stored!';
   }

   
   
}
/*
	   include '../moduls/display.php';
       echo'Data is stored!';
	   $r = new display($tablename1);
	   $data = $r->getAllData("id");
	   
	   
	   
	   if (is_array($data)) 
	   {
			?>
			<table>
                    <tr >
                        <th>Id</th>
                        <th>coursecode</th>
                        <th>coursename</th>
                        <th>teacherid</th>
                       <!-- <th>first name</th>
                        <th>last name</th>
                        <th>age</th>
                        <th>address</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>Edit</th>
                        <th>Delete</th>-->

                    </tr> 
                    <?php
                    //(`id`, `username`, `password`, `type`, `fname`, `lname`,
                    // `age`, `address`, `email`, `phone`)
                    for ($i = 0; $i < count($data); $i++) {
                        echo " <tr>
                <td>{$data[$i]['id']}</td>
                <td>{$data[$i]['course_code']}</td>
                <td>{$data[$i]['cname']}</td>
                <td>{$data[$i]['teacherid']}</td>

								</tr>";
                    }
                    ?>



                </table>
			<?php 
			
	   }
	   
	   
       
   }else 
   {  echo 'Data is not stored! ';}
   
            
             ?>         
       */
	   