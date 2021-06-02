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
            <div class="col-md-8"><h1 class="naslovAr">Login page</h1></div>
            <div class="col-md-2"></div>
        </section>
        <section class="row articles">
            <div class="col-md-2"></div>
            <div class="col-md-8 articles">
                <form action="#" method="post">
                    <label for="username">Username: </label><br><input type="text" name="username" id="username" class="wide"><br>
                    <label for="pass">Password: </label><br><input type="password" name="password" id="password" class="wide"><br>
                    <input type="submit" value="login" id="select">
                </form>
            </div>
            <div class="col-md-2"></div>
        </section>
        <section class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><h1 class="naslovAr">Logout</h1></div>
            <div class="col-md-2"></div>
        </section>
        <section class="row articles">
            <div class="col-md-2"></div>
            <div class="col-md-8 articles">
                <form method="post">
                    <input type="submit" value="logout" name="logout" id="select">
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
            $name = $_POST["username"]; 
            $password2 = $_POST["password"]; 

            $result1 = $conn->query("SELECT username, password, prava FROM korisnik WHERE username = '".$name."'");
            $row = $result1->fetch_assoc();

            if(mysqli_num_rows($result1) > 0 )
            { 
                if(password_verify($password2, $row["password"]))
                {
                    session_start();
                    $_SESSION["logged_in"] = true; 
                    $_SESSION["usernaam"] = $name;
                    $_SESSION["perm"] = $row["prava"]; 
                    echo "logged in";
                    header('Location: http://localhost/Projekt/index.php');
                }
                else
                {
                    echo "didnt log in";
                }
                
            }
            else
            {
                echo 'The username or password are incorrect!';
            }
            $conn->close();
        }
        if(isset($_POST["logout"]))
        {   
            session_start();
            echo "logged out";
            session_destroy();
        } 
    ?>
    <?php include 'footer.php' ?>
</body>
</html>