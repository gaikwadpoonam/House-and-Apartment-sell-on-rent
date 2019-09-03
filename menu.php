<style>
.main{

  background-size: cover;
display: flex;
align-items: center;
/*justify-content: center;
text-align: center;*/
color: white;
  }
.main a{
text-decoration: none;
color:#fff;
padding: 5px 20px;
border: 1px solid #fff;
transition: 0.6s ease;

}

.main a:hover{
  background-color: #fff;
  color:#000;
}
</style>


<div class="main">
	<a href="index.php">home</a>| 
	<a href="send.php">Publish</a>| 
	<a href="editpro.php">Edit profile</a>| 
	<a href="logout.php">logout</a><br><br></div>
	<?php
	//Check if there a session created
	session_start();
	if(isset($_SESSION['id'])){
		
		$userid=$_SESSION['id'];
		$conn=mysqli_connect('localhost','root','','test3');
	if(!$conn){
		echo "connection failed";
	}
//if session created get user name and profile image
	$select=mysqli_query($conn,"SELECT * FROM puser WHERE id='$userid'");
		$number=mysqli_num_rows($select);
		$userinfo=$select->fetch_assoc();
		$username=$userinfo['username'];
		$image=$userinfo['image'];
		$email=$userinfo['email'];
		echo "<img src= data:image/jpg;base64,$image width='5%' height='5%'>";
		echo "<br>";
		echo "<h3>Hello ".$username."</h3>";


	}
	else{
		//if no session created
		echo "<script language='Javascript'>";
		 		echo "document.location.replace('./login.php')";
		 		echo "</script>";
	}
	?>