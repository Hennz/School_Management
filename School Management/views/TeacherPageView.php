<?php 
session_start();
if($_SESSION['username'])
{?>



<head>
<link rel="stylesheet" href="css/try.css"> 
<link rel="stylesheet" href="css/try2.css"> 
<link rel="stylesheet" href="css/try3.css">
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"> 
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body >

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
                    <h3 class="position">Welcome you are a teacher in sun shine school</h3>
                    <h4 class="text-center location"><?php echo $_SESSION['address']; ?> , <?php echo $_SESSION['email']; ?></h4>
                    <div class="title-divider">
                        <span class="hr-divider col-xs-5"></span>
                        <span class="icon-separator col-xs-2"><i class="fa fa-star"></i></span>
                        <span class="hr-divider col-xs-5"></span>
                    </div>

                </div>
                
                <div class="col-md-8 col-md-offset-2 text-center">
                <!--<p class="caption">I'm Roland Maruntelu, webdesigner & wordpress theme developer at <a href="http://rolyart.ro">rolyart.ro.</a>I have a passion for creating challenging, clean and beautiful websit e/ wordpress themes.</p>-->
                <h2 class="slogan">Profile Menu <span class="glyphicon glyphicon-folder-open"></span></h2>
                <form action="../controller/LogoutController.php"method="post">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Logout</button>
				</form>
				<form style="display:inline" action="../controller/UpdateTeacherController.php"method="GET">
				<input  type="hidden" name="t_username" value="<?php echo $_SESSION['username']; ?>" class="btn-lg btn-primary">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Change your profile</button>
				</form>
				
                </div>
            </div>
        </div>
		
		
		
		
		<br/>
		<br/>
		<h1 style="color:red; font-family:Georgia">Courses pages links</h1>
		<br/>
		
		<?php 
			
			include_once'../moduls/TeacherClass.php';
				   
                    
                   	$teacher = new teacher();					
                   
                    $data = $teacher->getAllData($_SESSION['id']);
					if(count($data) == 0)
					{
						echo 'there is no request courses found';
					}
					else
					{

					
			
			?>
		
		
		<div class="container">
    <div class="row">
    
    
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-12">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span> courses groups</h3>
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
                        
                        <th class="hidden-xs">Course ID</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
						<th>Go to course page <em class="fa fa-cog"></em></th>
                    </tr> 
                  </thead>
				  
				  <?php 
					
					for ($i = 0; $i <count($data); $i++) {
                        echo "<tbody> <tr>
				                
                            
                            <td class='hidden-xs'>{$data[$i]['id']}</td>
                            <td>{$data[$i]['course_name']}</td>
                            <td>{$data[$i]['course_code']}</td>
							<td align='center'>
									<form action='../controller/TeacherCourseGroupController.php' method='GET'>
									<input type='hidden' name='go' value='yes'>
									<input type='hidden' name='id' value='{$data[$i]['id']}'>
									<input type='hidden' name='course_name' value='{$data[$i]['course_name']}'>
									<input type='hidden' name='course_code' value='{$data[$i]['course_code']}'>
									<input type='hidden' name='description' value='{$data[$i]['description']}'>
									<input type='hidden' name='hours' value='{$data[$i]['hours']}'>



										<button type='submit' class='btn btn-default'><em class='fa fa-pencil'></em> Go to {$data[$i]['course_name']} course </button></form>
							
							  
                            </td>
                          </tr>
                  </tbody>";
					}
                echo '</table>
            
              </div>
              
            </div>

</div></div></div>';

					}


		?>
		
		
		
		
	</section>






<!--<form  action="../controller/UpdateTeacherController.php"method="post">
	<input  type="hidden" name="t_username" value="<?php echo $_SESSION['username']; ?>" class="btn-lg btn-primary"><br>
	<input type="submit" value="change your profile" name="submit" />
</form>-->


<!--<form action="http://localhost:3333/SW2%20Project/Project/GUI/Version%201/graf_73645_voyage/voyage/controller/send.php" method="POST">

<input type="text" name="send"/>
<button type="submit" name="submit">send</button>
</form> -->























</body>


<?php 
}
else
{
	header("location:http://localhost:3333/School%20Management/IndexPage.php");

}

?>
