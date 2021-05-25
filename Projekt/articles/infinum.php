<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjektPHP</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>    
    <script type="text/javascript" src="js/javascript.js">
    </script>
</head>
<body>
    <?php 
        include '../header.php';
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "projekt";

        $conn = new mysqli($servername, $username, $password, $dbName);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    ?>
    <section id="mainSection" class ="container-fluid">
        <section class="row arsPgs">
            <div class="col-md-2"></div>
            <?php
                $sql = "SELECT id, naslov, content FROM article WHERE id = 9";
                $result = $conn->query($sql);
                $row  = $result->fetch_assoc();
                echo '<h1 class="col-md-8 articles naslovAr">'. $row["naslov"].'</h1>';
            ?>
            <div class="col-md-2"></div>
        </section>
        <section class="row ">
            <div class="col-md-2"></div>
            <article class="col-md-8 col-sm-12 articles">
                <img src="../images/infinum.png " alt="infinum" id="articleMainPic">
            </article>
            <div class="col-md-2"></div>
        </section>
        <section class="row">
            <div class="col-md-2"></div>
            <?php
                $sql = "SELECT id, naslov, content FROM article WHERE id = 9";
                $result = $conn->query($sql);
                $row  = $result->fetch_assoc();
                echo '<p class="col-md-8 articlesContent">'. $row["content"].'</p>';
            ?>
            <div class="col-md-2"></div>
        </section>
    </section>
    <?php
        include '../footer.php'
    ?>
</body>
</html>