<!DOCTYPE html>
<html>
<head>
	<title>Page</title>
	<style>    
    div.gallery {
margin-left: 60px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
  height: 430px;
  width: 300px;
  margin-top: 40px;
}

header{

  background-color: gray;
    height: 500vh;
    width: 200vh;
    background-size: cover;
    background-position: center;
}


div.gallery:hover {
  border: 1px solid #777;
}



div.gallery img {
  width: 100%;
  height: auto;
  height: 200px;
}



div.desc {
  padding: 15px;
  text-align: center;
}






</style>
</head>
<body>
<center><header>
  <!--<a href="post.php"><button>Login</button></a>-->
  

	<?php
	include 'menu.php';

//select all post according to the user id
	$sql = mysqli_query($conn,"SELECT * FROM ppostinfo WHERE userid='$userid'");
    $n_post=mysqli_num_rows($sql);
    if ($n_post>1) {
    	echo " You have  ".$n_post."  posts" ;
    }
    else{
    	echo " You have  ".$n_post."  post" ;
    }
    echo "<br>";
    
   

if ($n_post>0) {//if there are somes results do this
    while ($your_post=mysqli_fetch_assoc($sql)) {
      $id=$your_post['id'];
    	$title=$your_post['title'];
    	$image=$your_post['image'];
    	$content=$your_post['content'];
    	$content = substr($content,0,30).'...';
      $link="edit.php?id=".$id;
      $link2="delete.php?id=".$id;
    echo' <div class="gallery">';
    echo' <div class="desc"><h3>'.$title.'</h3></div>';
   echo "<img src= data:image/jpg;base64,$image width='900%' height='900%'>";
 echo' <div class="desc">'.$content.'</div>';
 echo"<br>";
 echo'<a href="'.$link.'">Edit</a>';
 echo "|";
 echo'<a href="'.$link2.'">Delete</a>';
echo '</div>';
    }


   

    
} else {
    echo "0 results";
}
	?>




</header>
</center>
	<body>
</html>