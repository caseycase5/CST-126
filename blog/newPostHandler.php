<!-- 
CST-126 Blog New Post Handler Handler page Version 1.0
Created by Casey Huz on December 13th 2020 for CST-126
Module provides the processing of the data inputed by the user 
during creation of a new blog post. This handler will add the
data to the SQL server.
-->

<?php
    $servername = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "blog";
    $postName = $_POST["postTitle"];
    $postContent = $_POST["postContent"];

    $conn = new mysqli($servername, $databaseUser, $password, $database);
    if($conn === false) {
        debugger_print("Error connecting");
        echo "Connection Error";
    }
    
    $sql = "INSERT INTO `posts`(`id`, `post_name`, `post_content`) VALUES (NULL, '$postName', '$postContent')";
    
    if(mysqli_query($conn, $sql)) {
        echo 'Post Added!';
    }
    else {
        echo 'Post Not Added!';
    }
    
    mysqli_close($conn);
?>