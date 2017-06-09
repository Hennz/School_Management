<?php 
session_start();
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
                    <h3 class="position">Welcome you are a <?php echo $_SESSION['type']; ?> in sun shine school</h3>
                    <h4 class="text-center location"><?php echo $_SESSION['address']; ?> , <?php echo $_SESSION['email']; ?></h4>
                    <div class="title-divider">
                        <span class="hr-divider col-xs-5"></span>
                        <span class="icon-separator col-xs-2"><i class="fa fa-star"></i></span>
                        <span class="hr-divider col-xs-5"></span>
                    </div>
					

                </div>
				

                
                <div class="col-md-8 col-md-offset-2 text-center">
				<?php
				if($_SESSION['type'] == 'teacher')
				{ ?>
				<a href="../views/TeacherPageView.php" type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Go Home</a>
				<?php 
				}
				else
				{ ?>
					<a href="SeeNotificationsController.php?submit=<?phpecho $_SESSION['id'];?>" type="submit" class="btn btn-primary btn-lg btn3d" name="submit"><span class="glyphicon glyphicon-cloud"></span> Go Home</a>
				<?php 
				}
				?>
                <!--<p class="caption">I'm Roland Maruntelu, webdesigner & wordpress theme developer at <a href="http://rolyart.ro">rolyart.ro.</a>I have a passion for creating challenging, clean and beautiful websit e/ wordpress themes.</p>-->
                <h2 style="color:blue" class="slogan"><?php echo $info['course_name']?> course <span class="glyphicon glyphicon-folder-open"></span></h2>
                <h3 style="color:red">Code : <?php echo $info['course_code']?></h3>
				<h3 style="color:red">Credit Hours : <?php echo $info['hours']?></h3>
                </div>
            </div>
        </div>
		
		
	

<br/>
<br/>

<?php 

if($_SESSION['type'] == 'teacher')
{
?>
<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Send Notifications <span></span></h4>
                <div class="form">
					<form action="../controller/NotificationController.php" method="GET">

					<input type="text" required=""name="content"placeholder="body of massage"class="txt" >
					<input type="hidden" name="course_id"class="btn-lg btn-primary" value="<?php echo $info['course_id'] ?>">
					<!--<input type="hidden" name="teacher_id"class="btn-lg btn-primary" value="">-->

					<input type="submit" value="send notify" name="submit" class="txt2"/>
					<!--<button type="submit" name="submit">send</button>-->
					</form>
					</div>
            </div>
            </div>
	</div>
</div>
<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Send Assignments <span></span></h4>
                <div class="form">
					<form action="../controller/NotificationController.php" method="POST" enctype="multipart/form-data">
						<input type="file" name="files[]"multiple="" >
						<br>
						<input type="hidden" name="course_id"class="btn-lg btn-primary" value="<?php echo $info['course_id'] ?>">
						<input type="submit" value="Upload" name="submit1" class="txt2">
					</form>
					</div>
            </div>
            </div>
	</div>
</div>
<?php

}
?>

<h2 style="color:blue" class="slogan">The Messages  <span class="glyphicon glyphicon-envelope"></span></h2>
<?php 
					$i =0;
					//echo count($notify);
					//session_start();
					//echo $_SESSION['id'];
					$content = null;
					for ($i = 0; $i <count($row); $i++) {
						
						if($content !=  $row[$i]['content'])
						{
							$content = $row[$i]['content'];
							echo "<p style='color:red;font-weight:bold;'>".$content."</p>";
						}
						else{}
					}
					echo'<br>';
					$j =0;
					
					$content1 = null;
					for ($j = 0; $j <count($row1); $j++) {
						
						if($content1 !=  $row1[$j]['assURL'])
						{
							$content1 = $row1[$j]['assURL'];
							$ass_name = $content1."f";
						?>
							<form method='POST'action='../controller/C-std.php'>
								<input type='submit'value='open'name='open'>
								<input type='hidden'value='<?php echo $row1[$j]['assURL']; ?>'name='path'><?php echo substr($ass_name,17,-1);?>
								<input type='hidden'value='<?php echo $row1[$j]['course_id']; ?>'name='title'>

								<!--<input name='title'type='hidden'value='$row1[$j]['id'] $row1[$j]['course_id']'> -->
							</form>
							
						<?php 	
						
						}
						else{}
					}
				
						
?>





</section>





<?php 
}
else
{
	header("location:http://localhost:3333/School%20Management/IndexPage.html");

}

?>


