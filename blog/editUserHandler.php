<!-- 
CST-126 Blog Project Edit User Handler page Version 1.0
Created by Casey Huz on January 16th 2021 for CST-126
Module handles processing of any edits made by the user.
-->
<?php
    $serverName = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";

    $id = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];
    $country = $_POST["country"];
    $role = $_POST["role"];
    
    $sql = "UPDATE `blog`.`users`
    SET
    `first_name` = '$firstName',
    `last_name` = '$lastName',
    `email` = '$email',
    `address` = '$address',
    `city` = '$city',
    `state` = '$state',
    `zipcode` = '$zipcode',
    `country` = '$country',
    `role` = '$role'
    WHERE `id` = '$id';";

    $conn = new mysqli($serverName, $databaseUser, $password, $database);
    if($conn === false) {
        echo ("Error connecting");
    }
    
    if(mysqli_query($conn, $sql)) {
        echo '<h1>User Updated!</h1>';
    }
    else {
        echo 'User Not Updated!';
    }

    /* `last_name` = `$lastName`,
    `email` = `$email`,
    `address` = `$address`,
    `city` = `$city`,
    `state` = `$state`,
    `zipcode` = `$zipcode`,
    `country` = `$country`,
    `role` = `$role`
    */
?>

<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Updated User</title>
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
	<br><?php echo $message?><br>
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

