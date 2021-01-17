<?php 
    $username = $_POST["username"];
    $userPassword = $_POST["password"];
    $serverName = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    $message = null;
    $firstName = "temp";
    $conn = new mysqli($serverName, $databaseUser, $password, $database);
    
    // Requesting data from the server only if it matches the inputted username/password
    $sql = "SELECT `users`.`id`,
    `users`.`user_name`,
    `users`.`password`,
    `users`.`first_name`,
    `users`.`last_name`,
    `users`.`email`,
    `users`.`address`,
    `users`.`city`,
    `users`.`state`,
    `users`.`zipcode`,
    `users`.`country`,
    `users`.`role`
    FROM `blog`.`users` 
    WHERE `user_name` = '$username' and `password` = '$userPassword'";

    $result = mysqli_query($conn,$sql);
    
    // Determining the number of rows returned
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        $message = ("Your login was successful!!");
        $row = mysqli_fetch_array($result);
        $id = ($row['id']);
        $firstName = ($row['first_name']);
        $lastName = ($row['last_name']);
        $email = ($row['email']);
        $address = ($row['address']);
        $city = ($row['city']);
        $state = ($row['state']);
        $zipcode = ($row['zipcode']);
        $country = ($row['country']);
        $role = ($row['role']);
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

    
    
?>
<!--
CST-126 Blog Project registration page Version 1.2
Created by Casey Huz on December 6th 2020 for CST-126
Module provides the layout for a new user to input their data
in order to create a new account.
-->
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Edit User Info</title>
<style>
body
{
    font-family: Calibri, Helvetica, sans-serif;
    background-color: #DEB887;
}

.registerButton
{
    background-color: #7FFFD4;
    color: black;
    cursor: pointer;
    padding: 15px 20px;
    border: none;
    width: 100%;
    opacity: 0.9;
}
</style>
</head>
<body>
<h1 id="title">Edit User Info</h1>

<form method="POST" id="registrationForm" action="editUserHandler.php">
<label id="username">ID:</label><br>
<input type="text" name="id" value="<?php echo $id?>" required><br><br>

<label id="username">Username:</label><br>
<input type="text" name="username" value="<?php echo $username?>" maxlength="20" required><br><br>

<label id="password">Password</label><br>
<input type="password" name="password" value="<?php echo $userPassword?>" minlength="10" maxlength="30" required><br><br>

<label id="firstName">First Name:</label><br>
<input type="text" name="firstName" value="<?php echo $firstName?>" maxlength="20" required><br><br>

<label id="lastName">Last Name:</label><br>
<input type="text" name="lastName" value="<?php echo $lastName?>" maxlength="20" required><br><br>

<label id="role">Role:</label><br>
<input list="roleSelection" name="role" value="<?php echo $role?>" required
pattern="Subscriber|Editor|Author|Contributor">
<datalist id="roleSelection">
<option value="Subscriber">
<option value="Editor">
<option value="Author">
<option value="Contributor">
</datalist><br><br>

<label id="email">Email:</label><br>
<input type="text" name="email" value="<?php echo $email?>" maxlength="30" required><br><br>

<label id="address">Address:</label><br>
<textarea cols="80" rows="3" name="address" maxlength="200" required><?php echo $address?></textarea><br><br>

<label id="city">City:</label><br>
<input type="text" name="city" value="<?php echo $city?>" maxlength="30" required><br><br>

<label id="state">State:</label><br>
<input type="text" name="state" value="<?php echo $state?>" maxlength="20" required><br><br>

<label id="zipcode">Zipcode:</label><br>
<input type="text" name="zipcode" value="<?php echo $zipcode?>" maxlength="10" required><br><br>

<label id="country">Country:</label><br>
<input type="text" name="country" value="<?php echo $country?>" maxlength="30" required><br><br>

<button type="submit" class="registerButton">Save Changes</button>
</form>
</body>
</html>

