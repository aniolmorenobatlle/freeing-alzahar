<!DOCTYPE html>
<html leng="ca">

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
			if ($result){
				if (mysqli_num_rows($result)>0){
					$row = mysqli_fetch_assoc($result);
					$nom = $row["username"];
					$mail = $row["email"];
					$passwd = $row["password"];
					$monedes = $row["monedes"];
					//header("Location: correcte.html");
				}else{
					echo "";
				}
			}else{
				$bbddOk = -1; // Error de connexió
			}
		}else{
			$bbddOk = -2; // Codi de producte no trobat
		}
	}else{
		$bbddOk = -1; // Error de connexió
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