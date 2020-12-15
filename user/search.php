<!DOCTYPE html>
<html>
    <head>
        <title>NutriTracks</title>
        <link rel="stylesheet" href="http://localhost/Nutritrack/login/style__login.css">
    </head>
    <body>
        <div menu style="text-align: right;">
            <button onclick="window.location.href='http://localhost/Nutritrack/index.html'">log out</button>
        </div>

        <h1>NutriTracks</h1>
        
        <div class="wrapper">
        <?php
        $food = $_POST['food'];
        echo 'This is nutritient for '.$food;
        

        $q = "SELECT * FROM foodinfo WHERE foodName = '$food'";
        $mysqli = new mysqli('localhost','root','','nutritrack','3307');
        if($result=$mysqli->query($q)){
            $result->data_seek(0);
            $row=$result->fetch_array();
            if(isset($row)){
                echo "<table border = '2' style='text-align:center;'><tr><th>Food Name</th><th>Protein</th><th>Carbohydrate</th><th>Fat</th><th>Sugar</th><th>Sodium</th><th>Calories</th></tr>";
                echo "<tr><td>".$row['foodName']."</td>";
                echo "<td>".$row['amount_protein']."</td>";
                echo "<td>".$row['amount_carb']."</td>";
                echo "<td>".$row['amount_fat']."</td>";
                echo "<td>".$row['amount_sugar']."</td>";
                echo "<td>".$row['amount_sodium']."</td>";
                echo "<td>".$row['amount_calories']."</td></tr></table>";
            }
            else{
                echo 'There is no '.$food.' in Database';
            }
                
            }
            else{
                echo $mysqli->error;
            }


        ?>
        <div>

        <?php
        $userid = $_GET['uid'];
        echo "<button><a href='home.php?uid=$userid'>Back</a></button>";
        ?>
        </div>

        

    </body>
</html>


