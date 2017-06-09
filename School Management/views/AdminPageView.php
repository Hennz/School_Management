<?php 
session_start();
if($_SESSION['username'])
{?>

<html>
<head>
<link rel="stylesheet" href="css/try.css"> 
<link rel="stylesheet" href="css/try2.css"> 
<link rel="stylesheet" href="css/try3.css">
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"> 
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
                    <h3 class="position">Welcome you are a admin in sun shine school</h3>
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
				
				
    			<a class="btn btn-primary btn-lg btn3d" href = "Add_delete_UpdateTeacherPageView.php"><span class="glyphicon glyphicon-cloud"></span> go to teacher section</a>
                <a class="btn btn-primary btn-lg btn3d" href = "Add_Delete_Update_StudentPageView.php"><span class="glyphicon glyphicon-cloud"></span> go to student section</a>

				
				
                </div>
            </div>
        </div>
		
		
		

	



<br/>
<br/>
<br/>
<br/>
		<h1 style="color:red; font-family:Georgia">Add Courses </h1>
<br/>


<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Update Course <span></span></h4>
                <div class="form">
            <form  action="../controller/AddCourseController.php"method="post">
			
            <input type="text" required=""name="course_name"placeholder="course name"class="txt"><br>
			<input type="text" required=""name="course_code"placeholder="course code"class="txt"><br>
            <input type="text" required=""name="description"placeholder="description"class="txt"><br>
			<input type="number" required=""name="hours"placeholder="hours"class="txt1"><br>
			<input type="text" required=""name="teacher_username"placeholder="teacher username"class="txt"><br>

           
            <input type="submit" value="add" name="submit" class="txt2"/>
            </form>
			</div>
            </div>
            </div>
	</div>
</div>
			
		

			<h1 style="color:red; font-family:Georgia">Courses Requests</h1>

			
			<?php 
			
			include_once'../moduls/AdminClass.php';
				   
                    
                   	$admin = new admin();					
                   
                    $data = $admin->getAllData();
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span> Courses Requests</h3>
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
                        
                        <th class="hidden-xs">student username</th>
                        <th>course name</th>
						<th>course code</th>
						<th style="text-align:center;">Accept course <em class="fa fa-cog"></em></th>
						<th style="text-align:center;">refuse course <em class="fa fa-cog"></em></th>

                    </tr> 
                  </thead>
					<?php 
		
		
			/*
                   include_once'../moduls/AdminClass.php';
				   
                    
                   	$admin = new admin();					
                   
                    $data = $admin->getAllData();
					if(count($data) == 0)
					{
						echo 'there is no new request courses found';
					}
					else{

					}*/
                    for ($i = 0; $i <count($data); $i++) {
						
                        echo " <tbody> <tr>
				<td>{$data[$i]['username']}</td>
				<td>{$data[$i]['course_name']}</td>
				<td>{$data[$i]['course_code']}</td>
				<td align='center'> <form action='../controller/Accept_Refuse_CourseController.php' method='post'>
					<input type='hidden' name='select' value='yes'>
					<input type='hidden' name='st_id' value='{$data[$i]['st_id']}'>
					<input type='hidden' name='username' value='{$data[$i]['username']}'>
					<input type='hidden' name='course_id' value='{$data[$i]['course_id']}'>
					<button type='submit' class='btn btn-default'><em class='fa fa-pencil'></em> accept Course</button></form></td>
									
				<td align='center'> <form action='../controller/Accept_Refuse_CourseController.php' method='post'>
					<input type='hidden' name='drop' value='yes'>
					<input type='hidden' name='st_id' value='{$data[$i]['st_id']}'>
					<input type='hidden' name='course_id' value='{$data[$i]['course_id']}'>
					<button type='submit' class='btn btn-default'><em class='fa fa-trash'></em> refuse Course</button></form></td>
					</tr>
					</tbody>";
					}
                echo '</table>
            
						</div>
						  
						</div>

						</div></div></div>';

						}
				  
						
						
						?>


<br/>

					<h1 style="color:red; font-family:Georgia">Courses Drop Requests</h1>
					
					<br/>
					<br/>
					<?php 
			
			include_once'../moduls/AdminClass.php';
				   
                    
                   	$admin = new admin();					
                   
                    $data = $admin->getAllDataForDrop();
					if(count($data) == 0)
					{
						echo 'there is no request dropping courses found';
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span> Courses Drop Requests</h3>
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
                        
                        <th class="hidden-xs">student username</th>
                        <th>course name</th>
						<th>course code</th>
						<th style="text-align:center;">Accept course <em class="fa fa-cog"></em></th>
						<th style="text-align:center;">refuse course <em class="fa fa-cog"></em></th>

                    </tr> 
                  </thead>
				  
				  <?php 
		
		
			/*
                   include_once'../moduls/AdminClass.php';
				   
                    
                   	$admin = new admin();					
                   
                    $data = $admin->getAllDataForDrop();
					if(count($data) == 0)
					{
						echo 'there is no new request courses found';
					}
					else{

					}*/
                    for ($i = 0; $i <count($data); $i++) {
                        echo " <tbody> <tr>
				<td>{$data[$i]['username']}</td>
				<td>{$data[$i]['course_name']}</td>
				<td>{$data[$i]['course_code']}</td>
                
                
                
                <td align='center'> <form action='../controller/Accept_Refuse_CourseController.php' method='post'>
					<input type='hidden' name='select1' value='yes'>
					<input type='hidden' name='st_id' value='{$data[$i]['st_id']}'>
					<input type='hidden' name='username' value='{$data[$i]['username']}'>
					<input type='hidden' name='course_id' value='{$data[$i]['course_id']}'>
					<button type='submit' class='btn btn-default'><em class='fa fa-pencil'></em> accept</button></form></td>
									
				<td align='center'> <form action='../controller/Accept_Refuse_CourseController.php' method='post'>
					<input type='hidden' name='drop1' value='yes'>
					<input type='hidden' name='st_id' value='{$data[$i]['st_id']}'>
					<input type='hidden' name='course_id' value='{$data[$i]['course_id']}'>
					<button type='submit' class='btn btn-default'><em class='fa fa-trash'></em> refuse</button></form></td>
                
                
                 
            </tr>
					</tbody>";
                   } echo '</table>
            
						</div>
						  
						</div>

						</div></div></div>'; 
               
           
					}
      
			
			
			?>
			
			
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  <br/>
				  <br/>
				  
				  	<h1 style="color:red; font-family:Georgia">Student Requests</h1>

					<?php 
			
			include_once'../moduls/AdminClass.php';
				   
                    
                   	//$admin = new admin();					
                   
                    $data = $admin->getAllStudentData();
					
					if(count($data) == 0)
					{
						echo 'there is no request student-parent found';
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span> Student Requests</h3>
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
                        
                        <th class="hidden-xs">student username</th>
						<th>student fname</th>
						<th>parent username</th>
                        <th>parent fname</th>
						
						<th style="text-align:center;">Accept student <em class="fa fa-cog"></em></th>
						<th style="text-align:center;">refuse student <em class="fa fa-cog"></em></th>

                    </tr> 
                  </thead>
				  
				  <?php 
		
		
			
                   //include_once'../moduls/AdminClass.php';
				   
                    
                   	//$admin = new admin();					
                   
                    //$data = $admin->getAllData();
					/*if(count($data) == 0)
					{
						echo 'there is no new request courses found';
					}
					else{

					}*/
                    for ($i = 0; $i <count($data); $i++) {
						$data1 = $admin->getAllParentData($data[$i]['id']);
                        echo "<tbody>  <tr>
				<td>{$data[$i]['username']}</td>
                <td>{$data[$i]['fname']}</td>
				<td>{$data1['username']}</td>
                <td>{$data1['fname']}</td>
				
                
                <td align='center'> <form action='../controller/Accept_Refuse_RigisterController.php' method='post'>
					<input type='hidden' name='select' value='yes'>
					<input type='hidden' name='st_id' value='{$data[$i]['id']}'>
					<button type='submit' class='btn btn-default'><em class='fa fa-pencil'></em> accept Student</button></form></td>
									
				<td align='center'> <form action='../controller/Accept_Refuse_RigisterController.php' method='post'>
					<input type='hidden' name='drop' value='yes'>
					<input type='hidden' name='st_id' value='{$data[$i]['id']}'>
					<button type='submit' class='btn btn-default'><em class='fa fa-trash'></em> refuse Student</button></form></td>
                
                
                 
            </tr>
					</tbody>";
                   } echo ' </table>
            
						</div>
						  
						</div>

						</div></div></div>'; 
               
           
					}
      
			
			
			?>
			
			
			
			
				  
				  
				  
				  
	</section>		
			
	
			
	</body>		
	
	<script>
	var activeEl = 2;
$(function() {
    var items = $('.btn-nav');
    $( items[activeEl] ).addClass('active');
    $( ".btn-nav" ).click(function() {
        $( items[activeEl] ).removeClass('active');
        $( this ).addClass('active');
        activeEl = $( ".btn-nav" ).index( this );
    });
});
	</script>
	
</html>

<?php 
}
else
{
	header("location:http://localhost:3333/School%20Management/IndexPage.html");

}

?>