<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);   
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: monedes.php");
        } else {
            echo "<div class='form'>
                  <h3>Usuario/contasenya incorrecte.</h3>
                  <br>
                  <p class='link'>Clica aquí per <a href='login.php'>inicia sessió</a> una altre vegada.</p>
                  </div>";
        }
    } 
?>
    <form href="monedes.php" class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true">
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">No tens compte? <a href="registration.php">Registre't aquí!</a></p>
    </form>
</body>
</html>
