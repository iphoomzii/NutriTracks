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
        
        <?php
        $userid = $_GET['uid'];
        echo "
        <form action='search.php?uid=$userid' method='POST'>
        <h2>";
        $q = "SELECT * FROM userinfo WHERE user = '$userid'";
        $mysqli = new mysqli('localhost','root','','nutritrack','3307');
        if($mysqli->connect_errno){
            echo $mysqli->connect_errno;
        }
        else{
            $q = "SELECT fname,lname FROM userinfo WHERE userid = '$userid'";
            if($result = $mysqli->query($q)){
                $result->data_seek(0);
                $row = $result->fetch_array();
            $fname = $row['fname'];
            $lname = $row['lname'];
            echo 'This is a home page of '.$fname .' '.$lname;
        }
        else{
            echo $row;
        }}
        ?></h2>
        
            <div class="wrapper">
            <br><label>search here..
                <input type="text" name="food">
            </label>
            <input type="submit">
            

        </form>
        
        <h3>OR</h3>
        <?php
        $userid = $_GET['uid'];
        echo "<button><a href='dashboard.php?uid=$userid'>Dashboard</a></button>";
        echo "<button><a href='consumption.php?uid=$userid'>Add consumption</a></button>";
        ?>
        </div>
        </div>
    </body>
</html>


