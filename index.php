<!DOCTYPE html>
<html>
<head>
	<title>SWEET HOME</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/gallery.css">
<link rel="stylesheet" href="css/pagination.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

    <style>


ol {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  text-align: right;

}

li {
  float: right;
  margin-left: 2%;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}







h1{
font-size: 500%;
font-weight: 500%;
}
div.gallery {
margin-left: 60px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
  height: 420px;
  width: 300px;
  margin-top: 100px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
  height: 250px;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>

<body>
  
  <center><h1>SWEET HOME</h1></center><br><br>
  <ol>

  <li><a class="" href=""><img src="img/logo.jpg"width="50px"height="50px"></a></li>
  <li><button><a class="active" href="login.php">Login</a></button></li>
<li><button><a class="active" href="getcode.php">Publish</button></a></li>
<!--<li><button><a class="active" href="registration.php">Register</button></a></li>-->
<li><a class="" href="">Email:poonmgaikwad2018@gmail.com</a></li>
<li><a class="" href="">Mob.no:7066058764</a></li>


</ol>


<?php
require 'index1.php';
?>
    <!--<div class = "container">

<center><a href="login.php"><img src="btn2.png" width="20%"hight="20%"></a> <a href="registration.php"><img src="reg2.png" width="200px" hight="20%"></a></center> 
<br>-->
<?php
    $conn=mysqli_connect('localhost','root','','test3');
	if(!$conn){
		echo "connection failed";
	}

//select all

	$perpage = 6;
          if(isset($_GET["page"])){
          $page = intval($_GET["page"]);
          }else {
          $page = 1;
          }
          $calc = $perpage * $page;
          $start = $calc - $perpage;
          $result = mysqli_query($conn, "SELECT * FROM ppostinfo ORDER BY id DESC  Limit $start, $perpage");
          $rows = mysqli_num_rows($result);

          if($rows){
          $i = 0;
        while($your_post = mysqli_fetch_assoc($result)) {
    	$id=$your_post['id'];
    	$title=$your_post['title'];
    	$image=$your_post['image'];
    	$content=$your_post['content'];
    	$content = substr($content,0,30).'...';
    	$link="article.php?id=".$id;

    echo' <div class="gallery">';
    echo' <div class="desc"><h3>'.$title.'</h3></div>';
   echo "<img src= data:image/jpg;base64,$image width='5%' height='5%'>";
 echo' <div class="desc">'.$content.'</div>';
 echo"<br>";
 echo'<a href="'.$link.'">Read More</a>';
echo '</div>';
    }


   

    
 
      }else{
              echo "<center>";
              echo "<font color = 'red'>";
              echo "NO POST YET !";
              echo "</font>";
              echo "</center>";
          }
	?>
    <br><br>
    

</div>
<center>
<?php
//page number footer
    if(isset($page)){
    $result = mysqli_query($conn,"select Count(*) As Total from ppostinfo");
    $rows = mysqli_num_rows($result);
    if($rows){
    $rs = mysqli_fetch_assoc($result);
    $total = $rs["Total"];
    }
    $totalPages = ceil($total / $perpage);
    if($page <=1 ){
    //echo "<span id='page_links' style='font-weight: bold;'>&laquo;</span>";
    }else{
    $j = $page - 1;
    echo "<a href='index.php?page=$j'>&laquo;</a>";
    }
    for($i=1; $i <= $totalPages; $i++){
    if($i<>$page){
      echo "<a href='index.php?page=$i'>$i</a>";
    }
    else
    {
      echo "<a href='index.php?page=$i' class='active'>$i</a>";
    }
  }
  if($page == $totalPages )
  {
//echo "<span id='page_links' style='font-weight: bold;'>&raquo;</span>";
  }else{
    $j = $page + 1;
    echo "<a href='index.php?page=$j'>&raquo;</a>";
    }
    }
    ?>
  </center>
</body>
</html>