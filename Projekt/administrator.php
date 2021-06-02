<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8 (Without BOM)">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjektPHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>    
    <script type="text/javascript" src="js/javascript.js">
    </script>
     <?php
        session_start();
        if(!isset($_SESSION["usernaam"]))
        {
            echo '<script>
                window.location.replace("http://localhost/Projekt/login.php");
            </script>';
            echo "not logged in";
        }
        else
        {
            echo "Logged in";
        }
    ?>
</head>
<body>
    <?php include 'header.php' ?>
    <section class="row">
        <div class="col-md-2 md-8 col-sm-1"></div>
        <h1 class="col-md-8 col-sm-10 articles naslovAr">Delete selected article</h1>
        <div class="col-md-2 md-8 col-sm-1"></div>
    </section>
        <section class="row arsPgs">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-8 col-sm-8">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbName = "projekt";

                    $conn = new mysqli($servername, $username, $password, $dbName);
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, naslov FROM article";
                    $result = mysqli_query($conn, $sql);

                    echo 
                    "<select name='username' form='forma' id='select'>";
                        while ($row = mysqli_fetch_array($result)) 
                        {
                            echo "<option value='" . $row["id"] ."'>". $row["id"] . " - " . $row["naslov"] . "</option>";
                        }
                    echo "</select>";
                    echo "<form method='post' name='forma' id='forma'><input type='submit' id='selectBtn' name ='btn' value='DELETE ARTICLE'></form>";

                    if(isset($_POST["btn"]))
                    {
                        $var = $_POST["username"];

                        $sql = "DELETE FROM article WHERE id='$var'";
                        
                        if ($conn->query($sql) === TRUE) {
                            echo "Record deleted successfully: " .$var ;
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                    }
                ?>
            </div>
            <div class="col-md-2 col-sm-1"></div>
        </section>
        <hr><hr>
        <section class="row">
            <div class="col-md-2 md-8 col-sm-1"></div>
            <h1 class="col-md-8 col-sm-10 articles naslovAr">Update selected article</h1>
            <div class="col-md-2 md-8 col-sm-1"></div>
        </section>
        <section class="row arsPgs">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-8 col-sm-8">
                <?php
                   $sql2 = "SELECT naslov, id FROM article";
                   $result2 = mysqli_query($conn, $sql2);
               
                   echo 
                   "<select name='selctedArticle' id='slectMe' form='forma2'>";
                       while ($row2 = mysqli_fetch_array($result2)) {
                           echo "<option  value='" . $row2["id"] ."'>". $row2["id"] . " - " . $row2["naslov"] . "</option>";
                       }
                   echo "</select>";
                   echo "<form method='get' name='forma2' id='forma2'><input type='submit' id='select' name ='btn2' value='pick'></form>";

                    if(isset($_GET["btn2"]))
                    {
                        $var2 = $_GET["selctedArticle"];
                        
                        $sql3 = "SELECT naslov, summary, content from article where id ='$var2';";
                        $result3 = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_array($result3);
                        echo '
                        <form method="post" action="#" enctype="multipart/form-data">
                            <h3>Update Naslov</h3><br><textarea rows="10" cols="250" name="naslov">'.$row3["naslov"].'</textarea><br><br>
                            <h3>Update Summary</h3><br><textarea rows="10" cols="250" name="summary">'.$row3["summary"].'</textarea><br><br>
                            <h3>Update content</h3><br><textarea rows="10" cols="250" name="content">'.$row3["content"].'</textarea><br><br>
                            <h3>Update picture</h3><input type="file" name="fileToUpload" id="fileToUpload"><br>
                            <input type="submit" value="update" name="updateButton">
                        </form>'; 
                        
                        if(isset($_POST["updateButton"]))
                        {
                            $sum = $_POST["naslov"];
                            $summary = $_POST["summary"];
                            $sadrzaj = $_POST["content"];
                            
                            $target_dir = "C:/xampp/htdocs/Projekt/images/";
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);  
                            $picName = '';
                            if ($uploadOk == 0) {
                                echo "<center>Sorry, your file ". basename ($picName =  $_FILES["fileToUpload"]["name"]). " was not uploaded.</center>";
                            } else {
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                    echo "<center><i><h4>The file ". basename ($picName =  $_FILES["fileToUpload"]["name"]). " has been uploaded.</h4></i></center>";
                                } else {
                                   echo "<center>Sorry, there was an error uploading your file ". basename ($picName =  $_FILES["fileToUpload"]["name"]). ".</font></center>";
                                }
                                 
                            }
                            

                            //$sql2 = "UPDATE article set naslov='$sum', summary='$summary', content='$sadrzaj', pictureName='$picName' where id = $var2";
                            $sql2 = "UPDATE article SET naslov=?, summary=?, content=?, pictureName=? where id=?";
                            $stmt = mysqli_stmt_init($conn);

                            if(mysqli_stmt_prepare($stmt, $sql2))
                            {
                                mysqli_stmt_bind_param($stmt, 'sssss', $sum, $summary, $sadrzaj, $picName, $var2);
                                mysqli_stmt_execute($stmt);
                                echo "record sucessfully saved";
                            }
                            
                        }       
                        
                    }
                ?>
            </div>
            <div class="col-md-2 col-sm-2"></div>

        </section>
    <?php include 'footer.php' ?>
</body>
</html>