<!-- 
CST-126 Blog Project Page Handler page Version 1.0
Created by Casey Huz on December 6th 2020 for CST-126
Module provides the processing of the data inputed by the user 
during registration and passes it to the sql server for storage.
User will be given a simple notification letting them know if the 
storage was successful.
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
    else echo("Connection established.");
    
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