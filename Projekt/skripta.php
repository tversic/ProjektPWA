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
    $summary = $_POST['summary'];
    

    $target_dir = "C:/xampp/htdocs/Projekt/images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "";
            $uploadOk = 1;
        } else {
            echo "<center>File is not an image.</center>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<center>Sorry, file already exists.</center>";
        $uploadOk = 0;
    }
    $picName = '';
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<center>Sorry, your file ". basename ($picName =  $_FILES["fileToUpload"]["name"]). " was not uploaded.</center>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<center><i><h4>The file ". basename ($picName =  $_FILES["fileToUpload"]["name"]). " has been uploaded.</h4></i></center>";
        } else {
            echo "<center>Sorry, there was an error uploading your file ". basename ($picName =  $_FILES["fileToUpload"]["name"]). ".</font></center>";
        }
    }
    echo "nesto " .$picName;
    $idCat = $_POST["cat"];

    $sql = "INSERT INTO article(naslov, content, pictureName, summary, category) VALUES('$naslov', '$content', '$picName', '$summary', '$idCat')";
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