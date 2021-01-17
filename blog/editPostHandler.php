<?php
$servername = "localhost";
$databaseUser = "root";
$password = "root";
$database = "blog";
$id = $_GET['id'];
$postName = $_POST["postTitle"];
$postContent = $_POST["postContent"];

$conn = new mysqli($servername, $databaseUser, $password, $database);
if($conn === false) {
    debugger_print("Error connecting");
    echo "Connection Error";
}

$sql = "UPDATE `blog`.`posts`
    SET
    `post_name` = '$postName',
    `post_content` = '$postContent'
    WHERE `id` = '$id';";

if(mysqli_query($conn, $sql)) {
    echo '<h1>Post Edited!</h1>';
}
else {
    echo '<h1>Post Not Edited!</h1>';
}
mysqli_close($conn);
?>

<head>
	<meta charset="ISO-8859-1">
	<title>Post Edited</title>
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