<html>
<head>
	<meta charset="ISO-8859-1">
	<title>All Posts</title>
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
</html>

<?php
    $serverName = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";

    $conn = new mysqli($serverName, $databaseUser, $password, $database);
    
    if($conn === false) {
        debugger_print("Error connecting");
        echo "Connection Error";
    }
    
    $sql = "SELECT `posts`.`id`,
    `posts`.`post_name`,
    `posts`.`post_content`
    FROM `blog`.`posts`;";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Post Name</th>";
            echo "<th>Post Content</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td name='id'>" . $row['id'] . "</td>";
                echo "<td>" . $row['post_name'] . "</td>";
                echo "<td>" . $row['post_content'] . "</td>";  
                $id = $row['id'];
                echo"<td><form method='POST' id='editPostForm' action='editPost.php?id=$id'>
                    <button type='submit' class='smallButton'>Edit Post</button></form></td>";
                echo"<td><form method='POST' id='deletePostForm' action='deletePostHandler.php?id=$id'>
                    <button type='submit' class='smallButton'>Delete Post</button></form></td>";
                
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        }
        else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
?>

	<br><form method="post" action="newpost.html">
		<button type="submit" class="button">Add a New Post</button>
	</form>