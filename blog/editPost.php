<!-- 
CST-126 Blog Project Edit Post page Version 1.0
Created by Casey Huz on January 23rd 2021 for CST-126
Module displays the current information for a post and
allows a user to change the data.
-->
<?php
    $serverName = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    $id = $_GET['id'];
    $conn = new mysqli($serverName, $databaseUser, $password, $database);
    
    $sql = "SELECT `posts`.`id`,
    `posts`.`post_name`,
    `posts`.`post_content`
    FROM `blog`.`posts`
    WHERE `posts`.`id` = '$id';";
    
    $result = mysqli_query($conn,$sql);
    
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        $row = mysqli_fetch_array($result);
        $id = ($row['id']);
        $postName = ($row['post_name']);
        $postContent = ($row['post_content']);
        mysqli_close($conn);
    }
    else if($count == 0) {
        $message = ("Your Login Name or Password is invalid");
    }
    else if($count > 1) {
        $message = ("There are multiple users registered with that username/password");
    }
    else {
        $message = ("Error. Please contact site admin.");
    } 
    mysqli_close($conn);
    
?>

<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Edit Post</title>
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
		height: 50px;
	</style>
</head>

<body>
	<h1 align="center">Edit Blog Post</h1>
		<form method="POST" id="newPostForm" action="editPostHandler.php?id=<?php echo $id ?>">
			<label id="postTitle">Post Title:</label><br>
			<input type="text" name="postTitle" value="<?php echo $postName?>" maxlength="50" required><br><br>
			
			<label id="postContent">Post Content:</label><br>
			<textarea name="postContent" rows="5" cols="100" placeholder="Post Content"><?php echo $postContent?></textarea><br><br>
			
			<button type="submit" class="newPostButton">Save Changes</button>
		</form>
	<br><form method="post" action="newpost.html">
		<button type="submit" class="button">Add a New Post</button>
	</form>
	
	<br><form method="post" action="viewAllPosts.php">
		<button type="submit" class="button">View All Posts</button>
	</form>
</body>
</html>