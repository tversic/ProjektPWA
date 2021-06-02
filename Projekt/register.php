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
    <section id="mainSection" class ="container">
        <section class="row articles">
            <div class="col-md-2"></div>
            <div class="col-md-8"><h1 class="naslovAr">Register page</h1></div>
            <div class="col-md-2"></div>
        </section>
        <section class="row articles">
            <div class="col-md-2"></div>
            <div class="col-md-8 articles">
                <form action="#" method="post">
                <label for="username">Username: </label><br><input type="text" name="username" id="username" class="wide"><br>
                <label for="pass">Password: </label><br><input type="password" name="password" id="password" class="wide"><br>
                <input type="submit" value="register" id="select">
                </form>
            </div>
            <div class="col-md-2"></div>
        </section>
    </section>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "projekt";

        $conn = new mysqli($servername, $username, $password, $dbName);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_POST["username"]))
        {
            $user_name = $_POST["username"];
            $pass = $_POST["password"];
            $hashed_password = password_hash($pass, CRYPT_BLOWFISH);
            $sql = "INSERT INTO korisnik(username, password, prava) VALUES ( '$user_name' , '$hashed_password', 0)";

            if($conn->connect_error)
            {
                die("connection failed");
            }
            $sql_u = "SELECT * FROM korisnik WHERE username='$user_name'";
            $res_u = mysqli_query($conn, $sql_u);

            if (mysqli_num_rows($res_u) > 0)
            {
                echo "username already taken";
            }
            else if ($conn->query($sql) === TRUE) 
            {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }   
            $conn->close();   
        }
    ?>
    <?php include 'footer.php' ?>
</body>
</html>