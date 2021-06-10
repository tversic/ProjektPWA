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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/form-validation.js"></script> 
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
                <form action="#" method="post" name="regForma">
                    <label for="username">Username: </label><br><input type="text" name="username" id="username" class="wide"><br>
                    <label for="pass">Email: </label><br><input type="text" name="email" id="email" class="wide"><br>
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
            $email = $_POST["email"];
            $pass = $_POST["password"];
            $hashed_password = password_hash($pass, CRYPT_BLOWFISH);
            //$sql = "INSERT INTO korisnik(username, password, prava) VALUES ( '$user_name' , '$hashed_password', 0)";
            $nula = 0;
            if($conn->connect_error)
            {
                die("connection failed");
            }
            $sql_u = "SELECT * FROM korisnik WHERE username='$user_name'";
            $res_u = mysqli_query($conn, $sql_u);

            $sql = "INSERT INTO korisnik(username, email, password, prava) VALUES ( ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_num_rows($res_u) > 0)
            {
                echo "<h3>username already taken</h3>";
            }
            else if (mysqli_stmt_prepare($stmt, $sql)) 
            {
                mysqli_stmt_bind_param($stmt, 'sssi', $user_name, $email, $hashed_password, $nula);
                mysqli_stmt_execute($stmt);
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }   
            $conn->close();   
        }
    ?>
        <script type="text/javascript">
            $(function()
            {
              $("form[name ='regForma']").validate
              ({
                rules:{
                  username: 
                  {
                    required: true,
                    minlength: 4,
                    maxlength: 30,
                  },
                  password:
                  {
                    required: true,
                    minlength: 5,
                    maxlength: 100,
                  },
                  email:
                  {
                    required: true,
                    minlenght: 4,
                  },
                },
                messages: 
                {
                  username:
                  {
                    required: "<br>Username ne smije biti prazan", 
                    minlength: "<br>Username nesmije biti manji od 4 znaka",
                    maxlength: "<br>Username nesmije biti veći od 30 znakova",
                  },
                  password:
                  {
                    required: "<br>password polje ne smije biti prazno",
                    minlength: "<br>password polje nesmije biti manji od 5 znakova",
                    maxlength: "<br>password polje nesmije biti veći od 100 znakova",
                  },
                  email:
                  {
                    required: "<br>email polje ne smije biti prazna",
                    minlength: "<br>email polje nesmije biti manje od 4 znaka"
                  },
                },
                submitHandler: function(form) 
                {
                  form.submit();
                }
              });
            });
        </script>

    <?php include 'footer.php' ?>
</body>
</html>