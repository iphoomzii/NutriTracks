<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/Nutritrack/login/style__login.css">

</head>
<body>

<?php


$username = $_POST['username'];
$password = $_POST['password'];


$mysqli = new mysqli('localhost','root','','nutritrack','3307');
    if($mysqli->connect_errno){
        echo $mysqli->connect_errno;
    }
    else{
        $q = "SELECT password,userid FROM userinfo WHERE username = '$username'";
        if($result = $mysqli->query($q)){
            $result->data_seek(0);
            $row = $result->fetch_array();
            if(!isset($row)){
                echo 'wrong username';
                echo "<button onclick=window.location.href='http://localhost/Nutritrack/login/login.html'>back</button>";
            }
            else{
                if($password == $row['password']){
                    $userid =$row['userid'];
                    echo "<h1>login success!</h1><br>
                    <p style='text-align: center'><a href='http://localhost/Nutritrack/user/home.php?uid=$userid'>Continue!
                    </a></p>
                    ";
                }
                else{
                    echo 'wrong password';
                    echo "<button onclick=window.location.href='http://localhost/Nutritrack/login/login.html'>back</button>";
                }
            }
        }       
    }
    $mysqli->close();
?>
    
</body>
</html>


