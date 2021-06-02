<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjektPHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>    
    <script type="text/javascript" src="js/javascript.js">
    </script>
</head>
<body>

    <?php 
        session_start();
        include 'header.php';
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "projekt";
        if(isset($_SESSION["usernaam"]))
        {
            echo "Current user: " . $_SESSION["usernaam"];
        }
        $conn = new mysqli($servername, $username, $password, $dbName);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    ?>

    <section id="mainSection" class ="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <h3 class="col-md-2 podnaslov">SPORT</h3>
            </div>
        </div>
        <section class="row rowDown">
            <div class="col-containers">     
               <div class="col-md-2"></div>
               <?php
                    $sql1 = "SELECT id, naslov, content, pictureName, category FROM article WHERE category = 1 and arhiva = 0";
                    $result1 = mysqli_query($conn, $sql1);
                    while($row = mysqli_fetch_array($result1))
                    {
                        $a = '<article class="col-md-2 col-sm-12 articles articlesHover" id="' . $row["id"] . '"  articles articlesHover" onclick="opensGeneratedArticle(this.id)">';
                        echo $a;
                        echo '<img src="images/'.$row["pictureName"].'" alt="article4" class="arPic">';
                        echo '<h4 class="articleHeader">'. $row['naslov'] .'</h4>
                        <p>
                            '. substr($row["content"], 0, 201) . ' ...'.'
                        </p>';
                        echo "</article>";
                    }     
                ?> 
                <div class="col-md-2"></div>;  
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <h3 class="col-md-2 podnaslov">BUISNESS</h3>
            </div>
        </div>
        <section class="row rowDown">
            <div class="col-containers">     
               <div class="col-md-2"></div>
               <?php
                    $sql9 = "SELECT id, naslov, content, pictureName, category FROM article WHERE category > 1 and arhiva = 0";
                    $result9 = mysqli_query($conn, $sql9);
                    while($row = mysqli_fetch_array($result9))
                    {
                        $a = '<article class="col-md-2 col-sm-12 articles articlesHover" id="' . $row["id"] . '"  articles articlesHover" onclick="opensGeneratedArticle(this.id)">';
                        echo $a;
                        echo '<img src="images/'.$row["pictureName"].'" alt="article4" class="arPic">';
                        echo '<h4 class="articleHeader">'. $row['naslov'] .'</h4>
                        <p>
                            '. substr($row["content"], 0, 201) . ' ...'.'
                        </p>';
                        echo "</article>";
                    }     
                    $conn->close();
                ?> 
                <div class="col-md-2"></div>;  
            </div>
        </section>
        
    </section>
    <?php
    include 'footer.php'
    ?>
</body>
</html>