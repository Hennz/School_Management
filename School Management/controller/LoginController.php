<?php 
/*require_once("connect.php");*/

if(isset($_POST["submit"])){
		include'../moduls/UsersClass.php';
	if(!empty($_POST['user']) && !empty($_POST['pass'])) {
		$username=$_POST['user'];
		$password=$_POST['pass'];
		$user = new users();
		$true = $user->login($username, $password);
		
		if ($true == true) 
		{
			@$type=  $_SESSION['type'];
			
			if($type=='student')
			{header("location: http://localhost:3333/School%20Management/views/StudentPageView.php");}
			elseif($type =='admin')
			{ header ("location: http://localhost:3333/School%20Management/views/AdminPageView.php");}
			elseif($type =='parent')
			{  header("location: http://localhost:3333/shoolsite/views/parentPage.php");}
			 elseif($type =='teacher')
			 {  header("location: http://localhost:3333/School%20Management/views/TeacherPageView.php");}
		}
		else 
		{
			
			echo 'did not found in db';
		}
	}
}
	/*	
		$conn = mysqli_connect($servername, $username, $password, $dbName);
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
		
		$sql = "SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'";
		if ($result=mysqli_query($conn, $sql)) 
		{
			echo "Database created successfully";
			
			
			@$rowcount=mysqli_num_rows($result);
				echo $rowcount ;
			if(@$rowcount!=0)
			{
				  while($row=mysqli_fetch_assoc($result))
					{
						$dbusername=$row['username'];
						@$dbpassword=$row['password'];
						$dbtype=$row['type'];
					}
					if($user == $dbusername && $pass == $dbpassword && $dbtype==1)
					{
					session_start();
					$_SESSION['sess_user']=$user;
					
					echo 'yes';
					 Redirect browser 
					header("Location: index1.html");
					
					}
					if($user == $dbusername && $pass == $dbpassword && $dbtype==2)
					{
					session_start();
					$_SESSION['sess_tech']=$user;
					
					echo 'yes';
					 Redirect browser 
					header("Location: index2.html");
					
					}
					
					if($user == $dbusername && $pass == $dbpassword && $dbtype==3)
					{
					session_start();
					$_SESSION['sess_addmin']=$user;
					
						echo 'yes';
					 Redirect browser 
					header("Location: index3.html");
					
					}
					
			}
			else 
			{
					echo "Invalid username or password!";
					echo $user;
					echo $pass;
			}
		} else {
			echo "Error creating database: " . mysqli_error($conn);
		}
	} else {
	echo "All fields are required!";
	}
		
}
/*
		mysqli_close($conn);
/*
*
*
*
*
*
*/	/*	
		$sql="SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'";

		$result=mysqli_query($con,$sql);
		  
		  // Return the number of rows in result set
		  
				
			/*	mysqli_free_result($result);*/
			/*	mysqli_close($con);
				

		  */
		
?>