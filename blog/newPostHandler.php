<!-- 
CST-126 Blog New Post Handler Handler page Version 1.0
Created by Casey Huz on December 13th 2020 for CST-126
Module provides the processing of the data inputed by the user 
during creation of a new blog post. This handler will add the
data to the SQL server.
-->

<?php
    $servername = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    $postName = $_POST["postTitle"];
    $postContent = $_POST["postContent"];

    $conn = new mysqli($servername, $databaseUser, $password, $database);
    if($conn === false) {
        debugger_print("Error connecting");
        echo "Connection Error";
    }
    
    $sql = "INSERT INTO `posts`(`id`, `post_name`, `post_content`) VALUES (NULL, '$postName', '$postContent');";
    
    if(mysqli_query($conn, $sql)) {
        echo 'Post Added!';
    }
    else {
        echo 'Post Not Added!';
    }
    
    mysqli_close($conn);
?>

<head>
	<meta charset="ISO-8859-1">
	<title>Post Added</title>
	<style>
	body
		{  
  			font-family: Calibri, Helvetica, sans-serif;  
 			background-color: #DEB887;  
		}

		.loginButton
		{
			background-color: #7FFFD4;  
  			color: black;  
			cursor: pointer;
  			padding: 15px 20px;
 			border: none; 
  			width: 100%;  
  			opacity: 0.9; 
		}
		
	   .button 
	   {
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