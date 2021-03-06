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
    <?php include 'header.php' ?>

    <div id="insertForm">
        <form action="skripta.php" method="post" enctype="multipart/form-data" name="forma">
            <label for="naslov">Insert article header: </label><input type="text" name="naslov" required="required"><br>
            <textarea rows="10" cols="250" name="summary" required="required">Insert short summary:</textarea><br><br>
            <textarea rows="10" cols="250" name="content" required="required">Insert article content:</textarea><br><br>
            <label for="pics">Choose picture</label><input type="file" name="fileToUpload" id="fileToUpload" required="required"><br>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbName = "projekt";
                $conn = new mysqli($servername, $username, $password, $dbName);
                $sql = "SELECT categoryName, id FROM category";
                $result = mysqli_query($conn, $sql);
                echo 
                "<label for='cat'>Pick category: </label><br>
                <select name='cat'>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row["id"] ."'>". $row["id"] . " - " . $row["categoryName"] . "</option>";
                    }
                echo "</select><br><br>";
            ?>
            <label for="arh" value="1">Spremiti u arhivu: </label><br><input type="checkbox" name="arh"><br><br>
            <input type="submit" value="Publish">
        </form>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>