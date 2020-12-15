<!DOCTYPE html>
<html>
    <head>
        <title>NutriTracks</title>
        <link rel="stylesheet" href="http://localhost/Nutritrack/login/style__login.css">
    </head>
    <body>
        <div menu style="text-align: right;">
            <?php
            $userid = $_GET['uid'];
            echo "<button><a href='dashboard.php?uid=$userid'>Dashboard</a></button>";
            echo "<button><a href='consumption.php?uid=$userid'>Add consumption</a></button>";
            ?>
            <button onclick="window.location.href='http://localhost/Nutritrack/index.html'">log out</button>
        </div>

        <div content style = "text-align: center;">
        <h1>NutriTracks</h1>
        <h2>Your progress..</h2>
        

        <?php
        $userid = $_GET['uid'];
        echo '<br>Today you ate ...<br>';  

        function consumption($userid){
            $q = "SELECT * FROM consumption INNER JOIN foodinfo ON consumption.foodid = foodinfo.food_id WHERE userid=$userid ";
            $mysqli = new mysqli('localhost','root','','nutritrack','3307');
            echo "<table border = '2' style='text-align:center;'><tr><th>Food Name</th><th>Protein</th><th>Carbohydrate</th><th>Fat</th><th>Sugar</th><th>Sodium</th><th>Calories</th></tr>";
            if($result=$mysqli->query($q)){
                while($row=$result->fetch_array()){
                    echo "<tr><td>".$row['foodName']."</td>";
                    echo "<td>".$row['amount_protein']."</td>";
                    echo "<td>".$row['amount_carb']."</td>";
                    echo "<td>".$row['amount_fat']."</td>";
                    echo "<td>".$row['amount_sugar']."</td>";
                    echo "<td>".$row['amount_sodium']."</td>";
                    echo "<td>".$row['amount_calories']."</td></tr>";
                    
                }
            }
            $q = "SELECT SUM(total_protein) as protein,SUM(total_carb) as carb,SUM(total_fat) as fat,SUM(total_calories) as cal,SUM(total_sodium) as sodium,SUM(total_sugar) as sugar FROM consumption WHERE userid=$userid";
            $mysqli = new mysqli('localhost','root','','nutritrack','3307');
            if($result=$mysqli->query($q)){
                $result->data_seek(0);
                $row=$result->fetch_array();
                if(isset($row)){
                    echo "<tr><td>Total</td>";
                    echo "<td>".$row['protein']."</td>";
                    echo "<td>".$row['carb']."</td>";
                    echo "<td>".$row['fat']."</td>";
                    echo "<td>".$row['sugar']."</td>";
                    echo "<td>".$row['sodium']."</td>";
                    echo "<td>".$row['cal']."</td></tr></table>";

        
        }    }}
                
        
        
        consumption($userid);

        ?>

        <div>
        <footer style="text-align: center;">
        <?php
        $userid = $_GET['uid'];
        echo "<button><a href='home.php?uid=$userid'>Back</a></button>";
        ?>
        </footer>

    </body>
</html>