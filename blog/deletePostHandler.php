<!-- 
CST-126 Blog Project Delete Post Handler page Version 1.0
Created by Casey Huz on January 14th 2021 for CST-126 Module
 handles the processing and deletion of a post from the database.
-->
<?php
    $serverName = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    $id = $_GET['id'];
    

    $conn = new mysqli($serverName, $databaseUser, $password, $database);
    
    $sql = "DELETE FROM `blog`.`posts`
           WHERE `id` = $id;";
    
    if(mysqli_query($conn, $sql)) {
        echo 'Post Deleted!';
    }
    else {
        echo 'Post Not Deleted!';
    }
    
    mysqli_close($conn);
    

?>

<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Delete Post</title>
	<style>
	body {  
  			font-family: Calibri, Helvetica, sans-serif;  
 			background-color: #DEB887;  
		}
	
	td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
      }

		.loginButton {
			background-color: #7FFFD4;  
  			color: black;  
			cursor: pointer;
  			padding: 15px 20px;
 			border: none; 
  			width: 100%;  
  			opacity: 0.9; 
		}
		
	   .button {
		background-color: #7FFFD4;
		width: 300px;
		cursor: pointer;
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		height: 75px;
	   }
	</style>
</head>

<body>
	<form method="post" action="newpost.html">
		<button type="submit" class="button">Add a New Post</button>
	</form>
	
	<form method="post" action="viewAllPosts.php">
		<button type="submit" class="button">View All Posts</button>
	</form>
	
	<form method="post" action="useraccount.html">
		<button type="submit" class="button">Edit User Information</button>
	</form>
</body>
</html>