<!DOCTYPE html>
<html lang="ca">

<?php
	require('db.php');
	$nom = $_POST["username"];
	$passwd = $_POST["password"];

	$bbddOk = 1;
	$sql = "SELECT * FROM users where username = '".$nom."'";
	$result = mysqli_query($con ,$sql);
	
	if ($result){
		if (mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			$id_cod = $row["id"];
			$sql = "SELECT username, email, password, monedes FROM users where id = '".$id_cod."'"; 
			$result = mysqli_query($con ,$sql);
			if (isset($_POST['username'])) {
                $username = stripslashes($_REQUEST['username']);   
                $username = mysqli_real_escape_string($con, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                $query    = "SELECT * FROM users WHERE username='$username'
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
			}else{
				$bbddOk = -1; // Error de connexió
			}
		}else{
			$bbddOk = -2; // Codi de producte no trobat
		}

	
?>

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
        <p>Hola, <?php echo $nom; ?>!</p>
		<p>Tens <?php echo $monedes; ?> monedes!</p>
        <p>Estas a la pàgina de registre o de inicia sessió.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>