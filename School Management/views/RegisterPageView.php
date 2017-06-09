<head>
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/register.css"> 

</head>
<center><h1>Registeration form</h1></center>

<div class="container">
	<div class="row">
    <div class="col-md-4">
		<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Registration <span></span></h4>
                <div class="form">
            <form  action="../controller/RegisterController.php" method="post" enctype="multipart/form-data">
			<h2> Student Section </h2>

            <input type="text" required=""name="s_username"placeholder="username" class="txt"><br>
            <input type="text" required=""name="s_password"placeholder="password" class="txt"><br>
            <input type="text" required=""name="s_fname"placeholder="first name" class="txt"><br>
            <input type="text" required=""name="s_lname"placeholder="last name" class="txt"><br>
            <input type="number" required=""name="s_phone"placeholder="phone" class="txt1"><br>
			<input type="text" required=""name="s_address"placeholder="address" class="txt"><br>
			<input type="number" required=""name="s_level"placeholder="level" class="txt1"><br>
			<input type="email" required=""name="s_email"placeholder="email" class="txt4"><br>
			<input type="number" required=""name="s_age"placeholder="age" class="txt1"><br>
			<input type="file" name="file" ><br>

			
           <h2>Parent Section </h2>
		   
			<input type="text" required=""name="p_username"placeholder="username" class="txt"><br>
            <input type="text" required=""name="p_password"placeholder="password" class="txt"><br>
            <input type="text" required=""name="p_fname"placeholder="first name" class="txt"><br>
            <input type="text" required=""name="p_lname"placeholder="last name" class="txt"><br>
            <input type="number" required=""name="p_phone"placeholder="phone" class="txt1"><br>
			<input type="text" required=""name="p_address"placeholder="address" class="txt"><br>
			<input type="text" required=""name="p_occupation"placeholder="occupation" class="txt"><br>
			<input type="email" required=""name="p_email"placeholder="email" class="txt4"><br>
			<input type="number" required=""name="p_age"placeholder="age" class="txt1"><br>
			<input type="file" name="file1" ><br>

            
            <input type="submit" value="Add" name="submit1" class="txt2"/>
            </form>
            </div>
            </div>
            </div>
	</div>
</div>

