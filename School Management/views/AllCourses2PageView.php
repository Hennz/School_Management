<body>

        <div class='row'>
            <div class='col-md-12'>
                <table class='table table-hover table-bordered' >
                    <tr class='danger'>
                      
						<th>id</th>
                        <th>course name</th>
                        <th>course code</th>

						
						<th>Description</th>
                        <th>Credit Hours</th>
						<th>teacher id</th>
                        <th>request Course</th>
                       <!-- <th>Drop Course</th> -->

                    </tr> 
                    <?php
					
					
                   include_once'../moduls/StudentClass.php';
				   session_start();
                    
                   if($_SESSION['username'])
				   {
						$id = $_SESSION['id'];
						$student = new student();
						
						//$count = $student->getcount('student_course_unreg',$id);
						$count1 = $student->getcount('student_course',$id);
						//echo "the number of courses you have selected is ".$count." the max is 6 ";echo'<br/>';
						echo "the number of courses the admin accepted them are ".$count1." the max is 6 ";

						$courses_rows = $student->displayregisteredcourses($id);
				   
					//echo count($courses_rows);
					//echo $courses_rows[$i]['id'];
					//$data = $show->getAllDatawithoutstudentcourse('id' , $username);
                    for ($i = 0; $i <count($courses_rows); $i++) {
					$courses_rows1 = $student->displayregisteredcourses2($courses_rows[$i]['course_id']);
                        echo " <tr>
                <td>{$courses_rows1['id']}</td>
                <td>{$courses_rows1['course_name']}</td>
				<td>{$courses_rows1['course_code']}</td>
                <td>{$courses_rows1['description']}</td>
				<td>{$courses_rows1['hours']}</td>
                <td>{$courses_rows1['teacher_id']}</td>
                
                
                <td> <form action='../controller/Register_C_Controller.php' method='post'>
				<input type='hidden' name='drop' value='yes'>
				<input type='hidden' name='course_id' value='{$courses_rows1['id']}'>

				<input type='submit' value='request drop Course'></form></td>

             
                 
				</tr>";
                   } echo ' </table> </div> </div>'; 
				   
					
				   }
				   else 
					{  
						header("location: http://localhost/SW2%20Project/Project/GUI/Version%201/graf_73645_voyage/voyage/index.php");
					}
               
           
       
      
                    ?>

					</body>
    

<!--<td> <form action='../controller/Register_C.php' method='post'>
<input type='hidden' name='drop' value='yes'>
<input type='hidden' name='course_id' value='{$courses_rows[$i]['id']}'>

<input type='submit' value='Drop Course'></form></td> -->




