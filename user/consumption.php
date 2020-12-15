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

        <div content style="text-align: center;">
        <h1>NutriTracks</h1>
        <h2>What did you eat today?</h2>
        <?php
        $userid = $_GET['uid'];
        echo "
        <form action='consumption.php?uid=$userid' method='POST'>";?>
            <br><label>type here..
                <input type="text" name="food"><input type="submit">
            </label></form>
            

        </div>
        <div footer style="text-align: center;">
        <?php
        $userid = $_GET['uid'];
        echo "<button><a href='home.php?uid=$userid'>Back</a></button>";
        ?>
        </div>
    </body>
</html>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $food = $_POST['food'];
    $q = "SELECT * FROM foodinfo WHERE foodName = '$food'";
    $mysqli = new mysqli('localhost','root','','nutritrack','3307');
        if($mysqli->connect_errno){
            echo $mysqli->connect_errno;
        }
        else{
            if($result = $mysqli->query($q)){
                $result->data_seek(0);
                $row = $result->fetch_array();
                if(isset($row)){
                    addFood($food);                    
                }
                else{
                    echo "There is no $food in our Database.";
                }
            
        }
        else{
            echo $mysqli->error;
        }}
}

function addFood($food){
    $userid = $_GET['uid'];
    $date = date("Y-m-d");
    $mysqli = new mysqli('localhost','root','','nutritrack','3307');
    if($mysqli->connect_errno){
        echo $mysqli->connect_errno;
    }
    else{
        //prepare value to add
        $q = "SELECT * FROM foodinfo WHERE foodName = '$food'";
        if($result = $mysqli->query($q)){
                $result->data_seek(0);
                $row = $result->fetch_array();
                
        }
        $foodid = $row['food_id'];
        $protein = $row['amount_protein'];
        $carb = $row['amount_carb'];
        $fat = $row['amount_fat'];
        $calories = $row['amount_calories'];
        $sodium = $row['amount_sodium'];
        $sugar = $row['amount_sugar'];

        //adding value
        
        $q = "INSERT INTO consumption(userid, foodid, date2, total_protein, total_carb, total_fat, total_calories,total_sodium, total_sugar) VALUES
                ($userid,$foodid,'$date',$protein,$carb,$fat,$calories,$sodium,$sugar)";
                $mysqli->query($q);
            

    }

    echo "You have add $food in your consumption.";

}
?>