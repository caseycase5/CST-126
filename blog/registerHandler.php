<!-- 
CST-126 Blog Project Registration Handler page Version 1.1
Created by Casey Huz on December 13th 2020 for CST-126
Module provides the processing of the data inputed by the user 
during registration and passes it to the sql server for storage.
User will be notified that the registration is complete and will be given
buttons that link them to the other pages on the site.
-->

<style>
		body
		{  
  			font-family: Calibri, Helvetica, sans-serif;  
 			background-color: #DEB887;  
		}
</style>

<?php

    $servername = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    $username = $_POST["username"];
    $userPassword = $_POST["password"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];
    $country = $_POST["country"];
    $role = $_POST["role"];

    $conn = new mysqli($servername, $databaseUser, $password, $database);
    if($conn === false) {
        debugger_print("Error connecting");
    }
    
    $sql = "INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `address`, `city`, `state`, `zipcode`, `country`, `role`) 
    VALUES (NULL, '$username', '$userPassword', '$firstName', '$lastName', '$email', '$address', '$city', '$state', '$zipcode', '$country', '$role')";
    
    if(mysqli_query($conn, $sql)) {
        echo 'Registration Complete!';
    }
    else {
        echo 'Data not inserted';
    }
    
    mysqli_close($conn);
?>

<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Registration Complete</title>
	<style>
	.button 
	{
		background-color: #7FFFD4;
		width: 300px;
		cursor: pointer;
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		height: 75px;
	}
	
	body {  
  		font-family: Calibri, Helvetica, sans-serif;  
 		background-color: #DEB887;  
	}
	
	</style>
</head>
<body>

	<form method="post" action="register.html">
		<button type="submit" class="button">Register</button><br><br><br>
	</form>
	
	<form method="post" action="login.html">
		<button type="submit" class="button">Login</button>
	</form>

</body>
</html>