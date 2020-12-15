<?php
$username = $_GET['username'];
$new_password = $_POST['newpass'];
$confirm_password =$_POST['cnewpass'];

if($new_password!=$confirm_password){
    echo "<div style='text-align: center;'><h1>Please Check Password Carefully!</h1>
    <button onclick=window.location.href='http://localhost/Nutritrack/login/forget.html'>back</button></div><br><br></div>";
}


else{
    $mysqli = new mysqli('localhost','root','','nutritrack','3307');
    if($mysqli->connect_errno){
        echo $mysqli->connect_errno;
    }
    else{
        $q = "UPDATE userinfo SET password='$new_password' WHERE username = '$username'";
        $mysqli->query($q);
        echo "<div style='text-align: center;'><h1>Your password has been reset!</h1>
        <button onclick=window.location.href='http://localhost/Nutritrack/login/login.html'>DONE!</button></div><br><br></div>";
    }
}

?>