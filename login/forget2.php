<!DOCTYPE html>
<html>
    <head>
        <title>Log in</title>
    </head>
    <body>
        <?php
        $username = $_GET['username'];
        $email = $_GET['email'];
        //this will check the exixtence of username & email.
        $mysqli = new mysqli('localhost','root','','nutritrack','3307');
    if($mysqli->connect_errno){
        echo $mysqli->connect_errno;
    }
    else{
        $q = "SELECT username,email FROM userinfo WHERE username = '$username' AND email = '$email'";
        if($result = $mysqli->query($q)){
            $result->data_seek(0);
            $row = $result->fetch_array();
            if(!isset($row)){
                echo "<br><div style='text-align:center'><h1>Wrong Username or Password</h1><br>
                <button onclick=window.location.href='http://localhost/Nutritrack/login/forget.html'>back</button></div><br><br>";
            }
            else{
              echo"
              <form action='http://localhost/Nutritrack/login/resetpass.php?username=$username' method='POST'>
                <div search_bar style='text-align: center;'>
            <h1 style='color: teal; text-align: center;'>NutriTracks</h1>
            <h2 style='color: teal; text-align: center;'>Reset Password</h2>
            <label>New password:
                <input type='password' name='newpass'>
            </label>
            <br>
            <label>Confirm new password:
                <input type='password' name='cnewpass'>
            </label>
            <div login_menu>
            <input type='submit' name='submit' value='Next'>
        </div>
    </form>";
            }
        }       
    }
    $mysqli->close();
        ?>
            
        
        

    </body>
</html>