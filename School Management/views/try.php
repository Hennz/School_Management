
<head>
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" href="css/try.css"> 
<link rel="stylesheet" href="css/try2.css"> 
<link rel="stylesheet" href="css/try3.css"> 

<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css"> 

</head>
<body>

<section id="about" class="section-content about">
        <div class="container">
        	<div class="row">
                <div class="col-md-6 col-md-offset-3">
                <figure class="fig-profile wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                	<img class="img-responsive img-circle img-profile" title="Roland Maruntelu" alt="your photo" src="<?php echo $_SESSION['photoUrl']; ?>" height='400px'width='400px'>
                    <figcaption>Hello !</figcaption> 
                    </figure>
                    <div class="flag">
             			<span class="blue"></span>
                   		<span class="yellow"></span>
                   		<span class="red"></span>
					</div>
                    <div class="clearfix"></div>

                    <h2 class="name"><b><?php echo $_SESSION['fname'];?></b> <?php echo $_SESSION['lname'];?></</h2>
                    <h3 class="position">Web Designer & Wordpress Theme Developer</h3>
                    <h4 class="text-center location">based in Bucharest, Romania</h4>
                    <div class="title-divider">
                        <span class="hr-divider col-xs-5"></span>
                        <span class="icon-separator col-xs-2"><i class="fa fa-star"></i></span>
                        <span class="hr-divider col-xs-5"></span>
                    </div>

                </div>
                
                <div class="col-md-8 col-md-offset-2 text-center">
                <p class="caption">I'm Roland Maruntelu, webdesigner & wordpress theme developer at <a href="http://rolyart.ro">rolyart.ro.</a>I have a passion for creating challenging, clean and beautiful websit e/ wordpress themes.</p>
                <h2 class="slogan">Profile Menu <span class="glyphicon glyphicon-folder-open"></span></h2>
                <a href="http://rolandtheme.com" class="btn btn-default secondary-bg btn-lg">View my passion</a>
                <a href="http://rolyart.ro/contact" class="btn btn-default page-scroll primary-bg btn-lg">Request custom theme</a>
				<button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-cloud"></span> Primary</button>
				<button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-cloud"></span> Primary</button>
				<button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-cloud"></span> Primary</button>
                </div>
            </div>
        </div>
		
		
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



<center><button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-cloud"></span> Primary</button></center>



</section>


</body>

