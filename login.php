<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<center><h1>LOGIN</h1></center><br><br><br><br><br><br><br>
<div class="backImg">

	<div class="profile">
		<img src="avtar.jpg">


	<!--<h1>Login</h1>-->
	<form method="POST" action="" enctype="multipart/form-data">
		<label>Email</label>
		<input type="text" name="email"><br><br>
        <label>Password</label>
		<input type="password" name="password1"><br><br>
		<input type="submit" name="submit" value="login">


	</form>

	<?php
	//Make connection
	$conn=mysqli_connect('localhost','root','','test3');
	if(!$conn){
		echo "connection failed";
	}

	if(isset ($_POST['submit'])){
		// create variables to store values from form
		$email=$_POST['email'];
		$password=md5($_POST['password1']);
		//select some information inside table
		$select=mysqli_query($conn,"SELECT * FROM puser WHERE email='$email' AND password='$password'");
		$number=mysqli_num_rows($select);// get number of result
		//echo $number;
		//echo "<br>";
		//echo $email.'-'.$password;

		if($select){
			//echo "good";
			if($number==1){
				session_start();
				$userinfo=$select->fetch_assoc();
				$userid=$userinfo['id'];
				$_SESSION['id']=$userid;
				echo "<script language='Javascript'>";
		 		echo "document.location.replace('./page.php')";
		 		echo "</script>";
			}
			else{
				echo "wrong password";
			}

		}

		else{
		 		echo ("error".mysqli_error($conn));
		 	}


	}




	?>


</header>
</div>
</div>

</body>
</html>