<?php 
//session_start();
if($_SESSION['username'])
{?>

<head>
<link rel="stylesheet" href="../views/css/try.css"> 
<link rel="stylesheet" href="../views/css/try2.css"> 
<link rel="stylesheet" href="../views/css/try3.css">
<link rel="stylesheet" href="../views/css/register.css">
<link rel="stylesheet" href="../views/css/bootstrap/css/bootstrap.min.css">  
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" href="../views/css/font-awesome.min.css">
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
             			<img src="../views/css/img/egsmall.gif" height='40px'width='60px'/>
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
				<form style="display:inline" action="../views/AllCoursesPageView.php" method="GET">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> View all courses</button>
				</form>
				<a href="../views/StudentPageView.php" type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Go Home</a>

				<form style="display:inline" action="../controller/UpdateStudentController.php"method="GET">
				<input  type="hidden" name="s_username" value="<?php echo $_SESSION['username']; ?>" class="btn-lg btn-primary">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Change your profile</button>
				</form>
				<form style="display:inline" action="../views/AllSelectedCoursesPageView.php" method="GET">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> View my courses</button>
				</form>
                </div>
            </div>
        </div>
		
	
			<h1 style="color:blue" class="slogan">courses groups  <span class="glyphicon glyphicon-folder-open"></span></h1>

	
		<?php 
					
					if(count($courses) != 0)
					{
					
					?>
					
	<div class="container">
    <div class="row">
    
    
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-12">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span>courses groups</h3>
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
                        
                        <th class="hidden-xs">course name</th>
						<th style="text-align:center">go to Course page <em class="fa fa-cog"></em> </th>
                    </tr> 
                  </thead>
					<?php 
					}
					else{
						echo 'there is no new notifications to read';
					}
					?>
					<?php 
					
					for ($i = 0; $i <count($courses); $i++) {
						include_once'../moduls/StudentClass.php';
					
						echo " <tbody> <tr>
						
							<td style='text-align:center'>{$courses[$i]['course_name']}</td>
							<td align='center'>
							<form action='../controller/TeacherCourseGroupController.php' method='GET'>
							<input type='hidden' name='go' value='yes'>
							<input type='hidden' name='id' value='{$courses[$i]['id']}'>
							<input type='hidden' name='course_name' value='{$courses[$i]['course_name']}'>
							<input type='hidden' name='course_code' value='{$courses[$i]['course_code']}'>
							<input type='hidden' name='description' value='{$courses[$i]['description']}'>
							<input type='hidden' name='hours' value='{$courses[$i]['hours']}'>


							<button type='submit' class='btn btn-default'><em class='fa fa-pencil'></em>go to {$courses[$i]['course_name']} course </button></form>
							</td>
							
							</tr>
							</tbody>";
					}
					echo '</table>
            
								</div>
								  
								</div>

								</div></div></div>';
								
					?>
							
	
	
	
	
	
	
				<h1 style="color:blue" class="slogan">Courses pages links  <span class="glyphicon glyphicon-folder-open"></span></h1>

				<?php 
					
					if($count != 0)
					{
					
					?>
					
	<div class="container">
    <div class="row">
    
    
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-12">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span>Courses pages links -Notifications</h3>
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
                        
                        <th class="hidden-xs">course id</th>
						<th >course name</th>
						<th >content</th>
						<th style="text-align:center">go to Course page <em class="fa fa-cog"></em> </th>
                    </tr> 
                  </thead>
					
					<?php 
					}
					else{
						echo 'there is no new notifications to read';
					}
					?>
					<?php 
					//echo count($notify);
					//session_start();
					//echo $_SESSION['id'];
					for ($i = 0; $i <count($notify); $i++) {
						include_once'../moduls/StudentClass.php';
						$student = new student();	
						//echo $notify[$i]['id'];
						//echo $notify[$i]['course_id'];					
						$data = $student->getAllData($notify[$i]['course_id']);
						echo " <tbody> <tr>
                <td>{$notify[$i]['course_id']}</td>
				<td>{$data['course_name']}</td>
                <td>{$notify[$i]['content']}</td>
				<td align='center'> <form action='../controller/TeacherCourseGroupController.php' method='GET'>
					<input type='hidden' name='submit' value='yes'>
					<input type='hidden' name='course_id' value='{$notify[$i]['course_id']}'>
					<input type='hidden' name='st_id' value='{$_SESSION['id']}'>
					<input type='hidden' name='id' value='{$notify[$i]['id']}'>


					<button type='submit' class='btn btn-default'><em class='fa fa-pencil'></em>go to {$data['course_name']} course </button></form></td>
					</tr>
							</tbody>";
					
					}
					echo '</table>
            
								</div>
								  
								</div>

								</div></div></div>';
								
					?>
	
	
	
	
	
				<?php 
					
					if($count1 != 0)
					{
					
					?>
				<div class="container">
    <div class="row">
    
    
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-12">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span>Courses pages links -Assignments</h3>
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
                        
                        <th class="hidden-xs">course id</th>
						<th >course name</th>
						<th >assignment url</th>
						<th style="text-align:center">go to Course page <em class="fa fa-cog"></em> </th>
                    </tr> 
                  </thead>
					<?php 
					}
					else{
						echo "<br>".'there is no new assignments to read';
					}
					?>
					<?php 
					//echo count($notify);
					//session_start();
					//echo $_SESSION['id'];
					for ($i = 0; $i <count($notify1); $i++) {
						include_once'../moduls/StudentClass.php';
						$student = new student();	
						//echo $notify[$i]['id'];
						//echo $notify[$i]['course_id'];					
						$data1 = $student->getAllData($notify1[$i]['course_id']);
						echo " <tbody> <tr>
                <td>{$notify1[$i]['course_id']}</td>
				<td>{$data1['course_name']}</td>
                <td>{$notify1[$i]['assURL']}</td>
				
                
                
                
                <td align='center'> <form action='../controller/TeacherCourseGroupController.php' method='GET'>
					<input type='hidden' name='submit' value='yes'>
					<input type='hidden' name='course_id' value='{$notify1[$i]['course_id']}'>
					<input type='hidden' name='st_id' value='{$_SESSION['id']}'>
					<input type='hidden' name='id' value='{$notify1[$i]['id']}'>


					<button type='submit' class='btn btn-default'><em class='fa fa-pencil'></em>go to {$data1['course_name']} course </button></form></td>
					</tr>
							</tbody>";
					
					}
					echo '</table>
            
								</div>
								  
								</div>

								</div></div></div>';
								
					?>
	
</section>




			

			

<?php 
}
else
{
	header("location:http://localhost:3333/School%20Management/IndexPage.php");

}

?>

			