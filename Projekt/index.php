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
        include 'header.php';
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <h3 class="col-md-2 podnaslov">SPORT</h3>
            </div>
        </div>
        <section class="row">
            <div class="col-containers">
                <div class="col-md-2"> </div>
                    <article class="col-md-2 col-sm-12 articles articlesHover" onclick="opensArticle('articles/mcgregor.php')">
                        <img src="images/mcgregor.png" alt="article1"  class="arPic">
                        <?php
                        $sql = "SELECT id, naslov, content FROM article WHERE naslov = 'COMEBACK'";
                        $result = $conn->query($sql);
                        $row  = $result->fetch_assoc();
                        echo '<h4 class="articleHeader">'. $row["naslov"] .'</h4>
                        <p>
                            '. substr($row["content"], 0, 201) .'...'.'
                        </p>';
                        ?>
                    </article>
                <article class="col-md-2 col-sm-12 articles articlesHover" onclick="opensArticle('articles/pejic.php')">
                    <img src="images/pejic.png" alt="article2" class="arPic">
                    <?php
                     $sql2 = "SELECT id, naslov, content FROM article WHERE naslov = 'BIG CHANCE'";
                     $result2 = $conn->query($sql2);
                     $row2  = $result2->fetch_assoc();
                    echo '<h4 class="articleHeader">'. $row2["naslov"] .'</h4>
                    <p>
                        '. substr($row2["content"], 0, 201) . ' ...'.'
                    </p>';
                    ?>
                </article>
                <article class="col-md-2 col-sm-12 articles articlesHover" onclick="opensArticle('articles/overeem.php')">
                    <img src="images/overeem.png" alt="article3" class="arPic">
                    <?php
                     $sql3 = "SELECT id, naslov, content FROM article WHERE naslov = 'HOLIDAY'";
                     $result3 = $conn->query($sql3);
                     $row3  = $result3->fetch_assoc();
                    echo '<h4 class="articleHeader">'. $row3["naslov"] .'</h4>
                    <p>
                        '. substr($row3["content"], 0, 201) . ' ...'.'
                    </p>';
                    ?>
                    
                </article>
                <article class="col-md-2 col-sm-12 articles articlesHover" onclick="opensArticle('articles/holloway.php')">
                    <img src="images/holloway.png" alt="article4" class="arPic">
                    <?php
                     $sql4 = "SELECT id, naslov, content FROM article WHERE naslov = 'NEXT MOVE'";
                     $result4 = $conn->query($sql4);
                     $row4  = $result4->fetch_assoc();
                    echo '<h4 class="articleHeader">'. $row4["naslov"] .'</h4>
                    <p>
                        '. substr($row4["content"], 0, 201) . ' ...'.'
                    </p>';
                    ?>
                </article>
                <div class="col-md-2"> </div>
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
                <div class="col-md-2"> </div>
                <article class="col-md-2 col-sm-12  articles articlesHover" onclick="opensArticle('articles/rimac.php')">
                    <img src="images/rimac.png" alt="article1"  class="arPic">
                    <?php
                     $sql5 = "SELECT id, naslov, content FROM article WHERE naslov = 'RIMAC WONT TAKE OVER BUGATTI'";
                     $result5 = $conn->query($sql5);
                     $row5  = $result5->fetch_assoc();
                    echo '<h4 class="articleHeader">'. $row5["naslov"] .'</h4>
                    <p>
                        '. substr($row5["content"], 0, 201) . ' ...'.'
                    </p>';
                    ?>
                </article>
                <article class="col-md-2 col-sm-12 articles articlesHover" onclick="opensArticle('articles/billGates.php')">
                    <img src="images/billGates.png" alt="article2" class="arPic">
                    <?php
                     $sql6 = "SELECT id, naslov, content FROM article WHERE naslov = 'BILL GATES RESPONDS ON AFFAIR WITH EMPLOYEE'";
                     $result6 = $conn->query($sql6);
                     $row6 = $result6->fetch_assoc();
                    echo '<h4 class="articleHeader">'. $row6["naslov"] .'</h4>
                    <p>
                        '. substr($row6["content"], 0, 201) . ' ...'.'
                    </p>';
                    ?>
                </article>
                <article class="col-md-2 col-sm-12 articles articlesHover" onclick="opensArticle('articles/todoric.php')">
                    <img src="images/todoric.png" alt="article3" class="arPic">
                    <?php
                     $sql7 = "SELECT id, naslov, content FROM article WHERE naslov = 'TODORIĆ UNHAPPY WITH COURT DECISION'";
                     $result7 = $conn->query($sql7);
                     $row7 = $result7->fetch_assoc();
                    echo '<h4 class="articleHeader">'. $row7["naslov"] .'</h4>
                    <p>
                        '. substr($row7["content"], 0, 201) . ' ...'.'
                    </p>';
                    ?>
                    
                </article>
                <article class="col-md-2 col-sm-12 articles articlesHover" onclick="opensArticle('articles/infinum.php')">
                    <img src="images/infinum.png" alt="article4" class="arPic">
                    <?php
                     $sql8 = "SELECT id, naslov, content FROM article WHERE id = 9";
                     $result8 = $conn->query($sql8);
                     $row8 = $result8->fetch_assoc();
                    echo '<h4 class="articleHeader">'. $row8["naslov"] .'</h4>
                    <p>
                        '. substr($row8["content"], 0, 201) . ' ...'.'
                    </p>';
                    ?>
                </article>
            <div class="col-md-2"> </div>
        </section>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <h3 class="col-md-2 podnaslov">NEWS</h3>
            </div>
        </div>
        <section class="row rowDown">
            <div class="col-containers">     
               <div class="col-md-2"></div>
               <?php
                    $sql9 = "SELECT id, naslov, content, pictureName, category FROM article WHERE id > 9 and category > 1";
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