<?php 
session_start();
if($_SESSION['username'])
{?>
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
				
				<a href="../views/AdminPageView.php" type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Go Home</a>
                <a class="btn btn-primary btn-lg btn3d" href = "Add_Delete_Update_StudentPageView.php"><span class="glyphicon glyphicon-cloud"></span> go to student section</a>

				
				
                </div>
            </div>
        </div>
		
		
		<br/>
		<br/>
				<h1 style="color:red; font-family:Georgia">Add Teacher </h1>

		


<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Add Teacher <span></span></h4>
                <div class="form">

			<form  action="../controller/AddTeacherController.php"method="post" enctype="multipart/form-data">

            <input type="text" required=""name="username"placeholder="username"class="txt"><br>
            <input type="text" required=""name="password"placeholder="password"class="txt"><br>
            <input type="text" required=""name="fname"placeholder="first name"class="txt"><br>
            <input type="text" required=""name="lname"placeholder="last name"class="txt"><br>
            <input type="number" required=""name="age"placeholder="age"class="txt1"><br>
            <input type="text" required=""name="address"placeholder="address"class="txt"><br>
            <input type="email" required=""name="email"placeholder="email"class="txt4"><br>
            <input type="number" required=""name="phone"placeholder="phone"class="txt1"><br>

            
            <input type="text" name="department"placeholder="department"class="txt"><br>
			
			<input type="file" name="file" >
            <!-- <input  type="hidden" name="type" value="teacher" class="btn-lg btn-primary"><br> -->
            <input type="submit" value="add" name="submit" class="txt2"/>
            </form>
			</div>
            </div>
            </div>
	</div>
</div>
			
			<br/>
			<br/>
			<br/>
			<br/>
			

							<h1 style="color:red; font-family:Georgia">Delete Teacher </h1>

			
			<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Delete Teacher <span></span></h4>
                <div class="form">
	
			<form  action="../controller/DeleteTeacherController.php"method="post">

            <input type="text" required=""name="username"placeholder="username"class="txt"><br>
            
            <!-- <input  type="hidden" name="type" value="teacher" class="btn-lg btn-primary"><br> -->
            <input type="submit" value="delete" name="submit" class="txt2"/>
            </form>
			</div>
            </div>
            </div>
	</div>
</div>
			
		
		
			<br/>
			<br/>
			<br/>
			<br/>
							<h1 style="color:red; font-family:Georgia">Update Teacher </h1>
<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Update Teacher <span></span></h4>
                <div class="form">
			
			<form  action="../controller/UpdateTeacherController.php"method="GET">

            <input type="text" required=""name="t_username"placeholder="username"class="txt"><br>
            
            <!-- <input  type="hidden" name="type" value="teacher" class="btn-lg btn-primary"><br> -->
            <input type="submit" value="update" name="submit" class="txt2"/>
            </form>
			</div>
            </div>
            </div>
	</div>
</div>
			
			
			
			
			
			
			
</section>

</body>
			
			
			
<?php 
}
else
{
	header("location:http://localhost:3333/School%20Management/IndexPage.html");

}

?>