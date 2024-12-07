<?php
require('db.php');

// Fase de desenvolupament mostrem ERRORS
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Carreguem les variables $_POST
$nom = $_POST["nomPost"];
$mail = $_POST["mailPost"];
$password = $_POST["passwordPost"];
$monedes = $_POST["monedesPost"];




//Es crea la connexió
//$con = new mysqli($serverdbname, $serverdbusername, $serverdbpassword, $dbName);
//Comprova la connexió
/*if(!$con){
	die("Connection Failed. ". mysqli_connect_error());
}*/
$sql="SELECT username FROM users WHERE username = ('".$nom."')";


$sql="UPDATE users SET monedes = ('".$monedes."') WHERE username = ('".$nom."')";
// Crear consulta


// execució consulta
$result = mysqli_query($con ,$sql);
    if ($result)
    {
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			$variablenom = $row["username"];

			if( $variablenom == "'.$nom.'")
			{ 
				$sql="UPDATE users SET monedes = ('".$monedes."') WHERE username = ('".$nom."')";
				$result = mysqli_query($con ,$sql);
				echo "Valor guardat!!!";
			}else
			{
				
				$result = mysqli_query($con ,$sql);
				echo "Valor guardat!!!";
			}
			


		}

	} else {
			
		echo "KK !!";
	}	
?>