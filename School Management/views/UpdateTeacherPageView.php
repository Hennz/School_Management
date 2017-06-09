<!--<form  action="../controller/UpdateTeacherController.php"method="post" enctype="multipart/form-data">
			<input type="hidden" name="t_id"class="btn-lg btn-primary" value="<?php echo $row['id']?>"><br>
			<input type="hidden" name="t_photoUrl"class="btn-lg btn-primary" value="<?php echo $row['photoUrl']?>"><br>

            <input type="text" name="t_username"placeholder="username"class="btn-lg btn-primary" value="<?php echo $row['username']?>"><br>
            <input type="text" name="t_password"placeholder="password"class="btn-lg btn-primary" value="<?php echo $row['password']?>"><br>
            <input type="text" name="t_fname"placeholder="first name"class="btn-lg btn-primary" value="<?php echo $row['fname']?>"><br>
            <input type="text" name="t_lname"placeholder="last name"class="btn-lg btn-primary" value="<?php echo $row['lname']?>"><br>
            <input type="text" name="t_age"placeholder="age"class="btn-lg btn-primary" value="<?php echo $row['age']?>"><br>
            <input type="text" name="t_address"placeholder="address"class="btn-lg btn-primary" value="<?php echo $row['address']?>"><br>
            <input type="text" name="t_email"placeholder="email"class="btn-lg btn-primary" value="<?php echo $row['email']?>"><br>
            <input type="text" name="t_phone"placeholder="phone"class="btn-lg btn-primary" value="<?php echo $row['phone']?>"><br>
 
            <input type="text" name="t_department"placeholder="department"class="btn-lg btn-primary" value="<?php echo $row['department']?>"><br>
			<input type="file" name="file" ><br>
			
			<input type="submit" value="update" name="submit1"/>
			</form>
			-->
			
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
             			<img src="../views/css/img/egsmall.gif" height='40px'width='60px'/>
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
				
				<a href="../views/TeacherPageView.php" type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Go Home</a>
				
								
				
                </div>
            </div>
        </div>
		<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Update <span></span></h4>
                <div class="form">
			<form  action="../controller/UpdateTeacherController.php"method="post" enctype="multipart/form-data">
			<input type="hidden" name="t_id"class="btn-lg btn-primary" value="<?php echo $row['id']?>"><br>
			<input type="hidden" name="t_photoUrl"class="btn-lg btn-primary" value="<?php echo $row['photoUrl']?>"><br>

            <input type="text" required=""name="t_username"placeholder="username"class="txt" value="<?php echo $row['username']?>"><br>
            <input type="text" required=""name="t_password"placeholder="password"class="txt" value="<?php echo $row['password']?>"><br>
            <input type="text" required=""name="t_fname"placeholder="first name"class="txt" value="<?php echo $row['fname']?>"><br>
            <input type="text" required=""name="t_lname"placeholder="last name"class="txt" value="<?php echo $row['lname']?>"><br>
            <input type="number" required=""name="t_age"placeholder="age"class="txt1" value="<?php echo $row['age']?>"><br>
            <input type="text" required=""name="t_address"placeholder="address"class="txt" value="<?php echo $row['address']?>"><br>
            <input type="email" required=""name="t_email"placeholder="email"class="txt4" value="<?php echo $row['email']?>"><br>
            <input type="number" required=""name="t_phone"placeholder="phone"class="txt1" value="<?php echo $row['phone']?>"><br>
 
            <input type="text" name="t_department"placeholder="department"class="txt" value="<?php echo $row['department']?>"><br>
			<input type="file" name="file" ><br>
			
			<input type="submit" value="update" name="submit1" class="txt2"/>
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
	header("location:http://localhost:3333/School%20Management/IndexPage.php");

}

?>
