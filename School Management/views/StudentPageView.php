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
				<form style="display:inline" action="AllSelectedCoursesPageView.php" method="GET">
				<button type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> View my courses</button>
				</form>
                </div>
            </div>
        </div>
		
	

<!--	
		<div class="container">
    <div class="row">
    
    
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Panel Heading</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr> 
                  </thead>
                  <tbody>
                          <tr>
                            <td align="center">
                              <button  action="../controller/UpdateTeacherController.php"method="post" enctype="multipart/form-data" class="btn btn-default"><em class="fa fa-pencil"></em></button>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
							  
                            </td>
                            <td class="hidden-xs">1</td>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                          </tr>
                        </tbody>
                </table>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

</div></div></div>
-->
<!--

<center><button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-cloud"></span> Primary</button></center>

-->

</section>


</body>
<?php 
}
else
{
	header("location:http://localhost:3333/School%20Management/IndexPage.php");

}

?>
