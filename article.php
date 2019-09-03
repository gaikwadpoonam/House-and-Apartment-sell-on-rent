<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	
	header{

  background-image: url("img/img1.jpg");
   
    background-size: cover;
    /*background-position: center;*/

}
</style>
<body>
	<header>


<?php
		$conn=mysqli_connect('localhost','root','','test3');
	if(!$conn){
		echo "connection failed";
	}
if(isset($_GET['id'])){

	$getid=$_GET['id'];
	

	$select=mysqli_query($conn,"SELECT * FROM ppostinfo WHERE id='$getid'");

		$number=mysqli_num_rows($select);
		$article=$select->fetch_assoc();
		$title=$article['title'];
		$image=$article['image'];
		$content=$article['content'];
		$datepost=$article['datep'];
		//get the username
		$userid=$article['userid'];
		$user=mysqli_query($conn,"SELECT * FROM puser WHERE id='$userid'");
		$userinfo=$user->fetch_assoc();
		$username=$userinfo['username'];

		echo "<center><h1>".$title."</h1></center>";
		echo "<br>";
		echo "<center>";
		echo "<img src= data:image/jpg;base64,$image width='30%' height='30%'>";
		echo"</center>";
		echo "<br>";
		echo "<center><p>".$content."</p></center>";
		echo "<br><br>";
		echo "published on : ".$datepost." by ".$username;


		


}

?>
<br><br>
<a href="index.php"><button><img src="back2.png" width="50px" height="50px"></button></a>
</header>
</body>
</html>