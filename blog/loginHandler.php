<!-- 
CST-126 Blog Project Login Handler page Version 1.0
Created by Casey Huz on December 13th 2020 for CST-126
Module provides the processing of user inputted username
and password and checks them against data stored on the SQL
server. It will then let the user know if they have successfully
logged in or not.
-->

<?php
    session_start();

    $serverName = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    $username = $_POST["username"];
    $userPassword = $_POST["password"];
    $message = "Null";
    $currentUsername = null;
    
    $conn = new mysqli($serverName, $databaseUser, $password, $database);


    // Ensuring the user inputted data into the fields
    if($username == null || $username === "") {
        echo("Username is a required field and cannot be blank.");
        echo("<br>");
    }

    if($userPassword == null || $userPassword === "") {
        echo("Password is a required field and cannot be blank.");
        echo("<br>");
    }

    // Requesting data from the server only if it matches the inputted username/password
    $sql = "SELECT ID FROM users WHERE user_name = '$username' and password = '$userPassword'";
    $result = mysqli_query($conn,$sql);

    // Determining the number of rows returned
    $count = mysqli_num_rows($result);

    // Returning an echo based on the number of rows returned
    if($count == 1) {
        $message = ("Your login was successful!!");
        $currentUsername = $username;
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
	<title>Login Success</title>
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
</html>