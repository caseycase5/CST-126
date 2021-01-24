<!-- 
CST-126 Blog Project Post Comments page Version 1.0
Created by Casey Huz on January 23rd 2021 for CST-126
Module prints out all comments associated to the post selected.
-->

<?php 
$serverName = "localhost";
$databaseUser = "root";
$password = "root";
$database = "blog";
$postID = $_GET['id'];

$conn = new mysqli($serverName, $databaseUser, $password, $database);

if($conn === false) {
    debugger_print("Error connecting");
    echo "Connection Error";
}

$sql = "SELECT `posts`.`id`,
    `posts`.`post_name`,
    `posts`.`post_content`,
    `posts`.`rating`
    FROM `blog`.`posts`
    WHERE `posts`.`id` = " . $postID . ";";


if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Post Name</th>";
        echo "<th>Post Content</th>";
        echo "<th>Post Rating</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td name='id'>" . $row['id'] . "</td>";
            echo "<td>" . $row['post_name'] . "</td>";
            echo "<td>" . $row['post_content'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            $id = $row['id'];
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    }
    else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    $conn->close();
}
?>


<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Post Comments</title>
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
	<br>
	<h3 align="left">New Comment:</h3>
	<form method="post" action="commentHandler.php?id=<?php echo $postID ?>">
		<label id="comment">Comment:</label><br>
		<textarea name="comment" rows="5" cols="100" placeholder="New Comment"></textarea><br><br>
		
		<label for="0">0</label>
		<input type="radio" name="rating" value="0">
		<label for="1">| 1</label>
		<input type="radio" name="rating" value="1">
		<label for="2">| 2</label>
		<input type="radio" name="rating" value="2">
		<label for="3">| 3</label>
		<input type="radio" name="rating" value="3">
		<label for="4">| 4</label>
		<input type="radio" name="rating" value="4">
		<label for="5">| 5</label>
		<input type="radio" name="rating" value="5">
		
		<button type="submit">Submit</button><br><br>
	</form>
	
	
	<h1 align="center">Post Comments</h1>
	
<?php 
	$conn = new mysqli($serverName, $databaseUser, $password, $database);
	
	if($conn === false) {
	    debugger_print("Error connecting");
	    echo "Connection Error";
	}
	
	$sql = "SELECT `comments`.`id`,
    `comments`.`assoc_post_id`,
    `comments`.`rating`,
    `comments`.`comment`
    FROM `blog`.`comments`
    WHERE `comments`. `assoc_post_id` = " . $postID . ";";
	
	if($result = mysqli_query($conn, $sql)){
	    if(mysqli_num_rows($result) > 0){
	        echo "<table align='center'>";
	        echo "<tr>";
	        echo "<th>Post ID</th>";
	        echo "<th>Comment ID</th>";
	        echo "<th>Comment</th>";
	        echo "<th>Rating</th>";
	        echo "</tr>";
	        while($row = mysqli_fetch_array($result)){
	            echo "<tr>";
	            echo "<td name='id'>" . $postID . "</td>";
	            echo "<td>" . $row['id'] . "</td>";
	            echo "<td>" . $row['comment'] . "</td>";
	            echo "<td>" . $row['rating'] . "</td>";
	            
	        }
	        echo "</table>";
	        // Free result set
	        mysqli_free_result($result);
	    }
	    else {
	        echo "This post does not have any comments.";
	    }
	}
	
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