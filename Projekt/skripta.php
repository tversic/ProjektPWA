<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "projekt";
    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $naslov = $_POST['naslov'];
    $content = $_POST['content'];
    $sql = "INSERT INTO article(naslov, content) VALUES('$naslov', '$content')";
    if ($conn->query($sql) == TRUE) 
    {
        echo "success";
        
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
    $conn->close();
    header("Location: http://localhost/Projekt/index.php");
    die();  
?>