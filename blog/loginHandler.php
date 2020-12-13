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
        echo ("Your login was successful!!");
    }
    else if($count == 0) {
        echo("Your Login Name or Password is invalid");
    }
    else if($count > 1) {
        echo("There are multiple users registered with that username/password");
    }
    else {
        echo ("Error");
    }

    mysqli_close($conn);
?>