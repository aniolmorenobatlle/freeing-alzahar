<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require('db.php');
    // Quan ho introduixes, insereix les dades a la bbdd.
    if (isset($_REQUEST['username'])) {
        // elimina backslashes (contrabarres)
        $username = stripslashes($_REQUEST['username']);
        // omitir caracters especials seguits
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "INSERT into `users` (username, password, email, monedes)
                     VALUES ('$username', '" . md5($password) . "', '$email', '0')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>T'has registrat correctament.</h3>
                  <br>
                  <p class='link'>Clica aquí per <a href='logout.php'>inici sessió.</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Falten camps per omplir.</h3><br/>
                  <p class='link'>Clica aqui per tornar a <a href='registration.php'>registrarte</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registre't</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required>
        <input type="text" class="login-input" name="email" placeholder="Email">
        <input type="password" class="login-input" name="password" placeholder="Password" require>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Ja tens un compte? <a href="login.php">Incia sessió aquí</a></p>
    </form>
<?php
    }
?>
</body>
</html>
