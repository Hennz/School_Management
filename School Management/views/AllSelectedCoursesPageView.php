<?php 
session_start();
if($_SESSION['username'])
{?>
<head>
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" href="css/try.css"> 
<link rel="stylesheet" href="css/try2.css"> 
<link rel="stylesheet" href="css/try3.css"> 
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"> 
<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" href="css/font-awesome.min.css"> 

</head>
<body>

	<section id="about" class="section-content about">
        <div class="container">
        	<div class="row">
                <div class="col-md-6 col-md-offset-3">
                <figure class="fig-profile wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                        <?php 
						$url = $_SESSION['photoUrl'];
			  echo '<img  title="Roland Maruntelu" alt="your photo" src="'.$url.'" width="300px"height="300px"  />'; //to show img 
						?>

					<figcaption>Hello !</figcaption> 
                    </figure>
                    <div class="flag">
             			<img src="css/img/egsmall.gif" height='40px'width='60px'/>
					</div>
                    <div class="clearfix"></div>

                    <h2 class="name"><b><?php echo $_SESSION['fname']; ?></b> <?php echo $_SESSION['lname']; ?></h2>
                    <h3 class="position">Welcome you are a Student in sun shine school</h3>
                    <h4 class="text-center location"><?php echo $_SESSION['address']; ?> , <?php echo $_SESSION['email']; ?></h4>
                    <div class="title-divider">
                        <span class="hr-divider col-xs-5"></span>
                        <span class="icon-separator col-xs-2"><i class="fa fa-star"></i></span>
                        <span class="hr-divider col-xs-5"></span>
                    </div>

                </div>
                
                <div class="col-md-10 col-md-offset-1 text-center">
                <!--<p class="caption">I'm Roland Maruntelu, webdesigner & wordpress theme developer at <a href="http://rolyart.ro">rolyart.ro.</a>I have a passion for creating challenging, clean and beautiful websit e/ wordpress themes.</p>-->
                <h2 class="slogan">Profile Menu <span class="glyphicon glyphicon-folder-open"></span></h2>
                <form action="../controller/LogoutController.php"method="post">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Logout</button>
				</form>
				<form style="display:inline" action="AllCoursesPageView.php" method="GET">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> View all courses</button>
				</form>
				<form style="display:inline" action="../controller/SeeNotificationsController.php"method="GET">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Go to notifications</button>
				</form>
				<form style="display:inline" action="../controller/UpdateStudentController.php"method="GET">
				<input  type="hidden" name="s_username" value="<?php echo $_SESSION['username']; ?>" class="btn-lg btn-primary">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Change your profile</button>
				</form>
				<a href="../views/StudentPageView.php" type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Go Home</a>

                </div>
            </div>
        </div>
		
		
		<br/>
		<br/>
		<?php 
		 include_once'../moduls/StudentClass.php';
				   //session_start();
                    
                   if($_SESSION['username'])
				   {
						$id = $_SESSION['id'];
						$student = new student();
						//echo $id;
						$count = $student->getcount('student_course',$id);
					//	$count1 = $student->getcount('student_course',$id);
						echo "<p style='color:red;font-weight:bold;'>the number of courses you have selected is ".$count." the max is 6 </p>";
					//	echo "the number of courses the admin accepted them are ".$count1." the max is 6 ";

						$courses_rows = $student->displayregisteredcourses($id);
						//echo 'what';
						//echo count($courses_rows);
					if($courses_rows == 0)
					{
						echo 'there is no any courses you have selected';
					}
					else
					{
					
	
	
	?>
	
	<br/>
	<br/>
	<div class="container">
    <div class="row">
    
    
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-12">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span> All My Courses</h3>
                  </div>
                  <!--<div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                  </div>-->
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        
                        <th class="hidden-xs">ID</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
						<th>Description</th>
						<th>Credit Hours</th>
						<th>request Drop Course</th>
                    </tr> 
                  </thead>
				  
					<?php 
                    for ($i = 0; $i <count($courses_rows); $i++) {
						if($courses_rows[$i] != null)
						{
						echo "<tbody> <tr>
                <td class='hidden-xs'>{$courses_rows[$i]['id']}</td>
                <td>{$courses_rows[$i]['course_name']}</td>
				<td>{$courses_rows[$i]['course_code']}</td>
                <td>{$courses_rows[$i]['description']}</td>
				<td>{$courses_rows[$i]['hours']}</td>
                
                
                <td> <form action='../controller/Register_C_Controller.php' method='post'>
				<input type='hidden' name='drop' value='yes'>
				<input type='hidden' name='course_id' value='{$courses_rows[$i]['id']}'>
				
				<button type='submit' class='btn btn-default'><em class='fa fa-pencil'></em>drop Course</button></form></td>
				</tr>
					</tbody>";
						}
							}
							
							echo '</table>
            
								</div>
								  
								</div>

								</div></div></div>';
							}
							
							}
				   else 
					{  
						header("location: http://localhost/SW2%20Project/Project/GUI/Version%201/graf_73645_voyage/voyage/index.php");
					}
               
           
       
      
                    ?>

		
		
		
		
		
		
		
	</section>
	
</body>


    


<?php 
}
else
{
	header("location:http://localhost:3333/School%20Management/IndexPage.php");

}

?>


