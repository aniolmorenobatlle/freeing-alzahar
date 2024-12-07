<?php
// Hi ha un auth_session.php a tots els arxius
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hola, <?php echo $_SESSION['username']; ?>!</p>
        <p>estas a la pàgina de registre o de inicia sessió</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
