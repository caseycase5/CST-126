<!-- 
CST-126 Blog Project Comment Handler page Version 1.0
Created by Casey Huz on January 23rd 2021 for CST-126
Module handles the processing and updating of a new comment.
-->

<?php
    $serverName = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    $comment = $_POST["comment"];
    $commentRating = $_POST["rating"];
    $assocId = $_GET['id'];
    $totalRatings = 0;
    $postRating;

    $conn = new mysqli($serverName, $databaseUser, $password, $database);

    if($conn === false) {
        debugger_print("Error connecting");
        echo "Connection Error";
    }
    
    $sql = "INSERT INTO `blog`.`comments`
    (`id`, `assoc_post_id`, `rating`, `comment`)
    VALUES
    (NULL, '$assocId', '$commentRating', '$comment');";
    ?>
    
    <html>
	<head>
	<meta charset="ISO-8859-1">
	<title>Comment Added</title>
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
	   }
	</style>
</head>

<body>

<?php 
	if(mysqli_query($conn, $sql)) {
        echo ("<h1>Comment Added!<h1>");
	}
	else {
	    echo '<h1>Error! Comment Not Added!</h1>';
	}
	
	mysqli_close($conn);
	$conn = new mysqli($serverName, $databaseUser, $password, $database);
	
	$sql = "SELECT `posts`.`rating`,
        `posts`.`total_ratings`
        FROM `blog`.`posts`
        WHERE `posts`.`id` = '$assocId';";
	
	$result = mysqli_query($conn,$sql);
	
	$count = mysqli_num_rows($result);
	
	    $row = mysqli_fetch_array($result);
	    $totalRatings = ($row['total_ratings']);
	    $postRating = ($row['rating']);
	
	$postRating = (($postRating * $totalRatings) + $commentRating) / ($totalRatings + 1);
	$totalRatings++;
	
	mysqli_close($conn);
	$conn = new mysqli($serverName, $databaseUser, $password, $database);
	
	$sql = "UPDATE `blog`.`posts`
    SET `rating` = '$postRating', `total_ratings` = '$totalRatings'
    WHERE `id` = '$assocId';";
	
	mysqli_query($conn, $sql);
	
?>

	<br><form method="post" action="newpost.html">
		<button type="submit" class="button">Add a New Post</button>
	</form>
	
	<form method="post" action="viewAllPosts.php">
		<button type="submit" class="button">View All Posts</button>
	</form>
	
	<br><form method="post" action="mainmenu.html">
		<button type="submit" class="button">Main Menu</button>
	</form>
</body>
</html>

