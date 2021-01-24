<!-- 
CST-126 Blog Project searchHandler page Version 1.0
Created by Casey Huz on January 23rd 2021 for CST-126
Module handles the processing of data with the server to search
the current database for terms entered by the user.
-->
<?php 
    $searchPattern = $_GET["searchPattern"];
    
    $serverName = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    
    $conn = new mysqli($serverName, $databaseUser, $password, $database);
    
    if($conn === false) {
        debugger_print("Error connecting");
        echo "Connection Error";
    }

    $sql = "SELECT * FROM posts WHERE post_name LIKE '%$searchPattern%' or
        post_content LIKE '%$searchPattern%';";
?>

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
		height: 50px;
	   }
	</style>
</head>
<body>
	<!-- Creates a search bar and button to allow the user to search for posts. -->
	<h1 align="center">View All Posts</h1><br><br>

	<form action="searchHandler.php">
		<input type="search" name="searchPattern" value="<?php echo $searchPattern?>">
		<button type="submit">Search</button><br><br>
	</form>
	
<?php 
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
            echo "No Results <br>";
        }
    }
?>

	<br><form method="post" action="newpost.html">
		<button type="submit" class="button">Add a New Post</button>
	</form>
	
	<br><form method="post" action="mainmenu.html">
		<button type="submit" class="button">Main Menu</button>
	</form>
    </body>
</html>