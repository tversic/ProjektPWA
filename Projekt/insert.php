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

    <div id="insertForm">
        <form action="skripta.php" method="post" enctype="multipart/form-data" name="forma" id="forma">
            <label for="naslov">Insert article header: </label><input type="text" name="naslov" id="naslov" required="required"><br>
            <textarea rows="10" cols="250" name="summary" id="summary" required="required">Insert short summary:</textarea><br><br>
            <textarea rows="10" cols="250" name="content" id="content" required="required">Insert article content:</textarea><br><br>
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
                <select name='cat' required='required'>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option required='required' value='" . $row["id"] ."'>". $row["id"] . " - " . $row["categoryName"] . "</option>";
                    }
                echo "</select><br><br>";
            ?>
            <label for="arh" value="1">Spremiti u arhivu: </label><br><input type="checkbox" name="arh"><br><br>
            <input type="submit" value="Publish">
        </form>
        <script type="text/javascript">
    $(function()
    {
      $("form[name ='forma']").validate
      ({
        rules: {
          naslov: 
          {
            required: true,
            minlength: 5,
            maxlength: 30,
          },
          summary:
          {
            required: true,
            minlength: 10,
            maxlength: 100,
          },
          content:
          {
            required: true,
          },
        },
        messages: 
        {
          naslov:
          {
            required: "<br>Naslov ne smije biti prazan", 
            minlength: "<br> nesmije biti manji od 5 znakova",
            maxlength: "<br>Naslov nesmije biti veći od 30 znakova",
          },
          summary:
          {
            required: "<br>summary polje ne smije biti prazno",
            minlength: "<br>summary polje nesmije biti manji od 10 znakova",
            maxlength: "<br>summary polje nesmije biti veći od 100 znakova",
          },
          content:
          {
            required: "<br>content polje ne smije biti prazna",
          },
        },
        submitHandler: function(form) 
        {
          form.submit();
        }
      });
    });
  </script>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>