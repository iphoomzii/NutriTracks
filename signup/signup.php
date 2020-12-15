<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$dob = date_format(date_create($birthday),'d/m/Y');
$age = (int)(date('Y')) - (int)(substr($dob,6,10));

$weight = (float)($_POST['weight']);
$height = (float)($_POST['height']);
$bmi = $weight/(($height/100)*($height/100));

$username = $_POST['username'];
$password = $_POST['password'];
$confirmedpassword=$_POST['confirmedpassword'];


if(
    strlen($fname) == 0 ||
    strlen($lname) == 0 ||
    strlen($gender) == 0 ||
    strlen($email) == 0 ||
    strlen($dob) == 0 ||
    strlen($weight) == 0 ||
    strlen($height) == 0 ||
    strlen($username) == 0 ||
    strlen($confirmedpassword) == 0 ||
    strlen($password) == 0
){
    echo "<h1 style = 'text-align: center;'>please fill in every information! </h1>";
    echo "<div style = 'text-align: center;'><button onclick=window.location.href='http://localhost/Nutritrack/signup/signup.html' >back</button></div>";

}
elseif($confirmedpassword != $password){
    echo "<h1 style = 'text-align: center;'>please check your password! </h1>";
    echo "<div style = 'text-align: center;'><button onclick=window.location.href='http://localhost/Nutritrack/signup/signup.html' >back</button></div>";
}
else{
    $mysqli = new mysqli('localhost','root','','nutritrack','3307');
    if($mysqli->connect_errno){
        echo $mysqli->connect_errno;
    }
    else{
        $insert_user = "INSERT INTO userinfo(username, password, fname, lname, gender, email, bd, age, weight, height, bmi)
        VALUES('$username', '$password', '$fname', '$lname', '$gender', '$email', '$birthday', '$age', $weight, $height, $bmi)";
        if(!$mysqli->query($insert_user)){
            echo $mysqli->error;
        }
        else{
            echo "<h1 style='text-align: center;'>Sign up success!</h1>
            <br><div style='text-align: center;'>
            <button onclick=window.location.href='http://localhost/Nutritrack/login/login.html'>Log In</button>
            </div>";
        }
            
    }
    $mysqli->close();
}
?>