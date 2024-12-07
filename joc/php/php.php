<?php
require('db.php');
$eanPost = $_POST["eanPost"];      

	//Make Connection DB
	//$con = new mysqli($serverdbname, $serverdbusername, $serverdbpassword, $dbName);
	
	//Check Connection
	if(!$con){
		die("Connection Failed. ". mysqli_connect_error());
	}
	// Cerquem l'usuari a la BBDD
	$bbddOk = 1;
	$sql = "SELECT id, nom, diners FROM money"; 
	$result = mysqli_query($con ,$sql);
	if ($result){
	//	echo "Succefulled !! 1 <br>";
		if (mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			$id_cod = $row["id"];
			$sql = "SELECT nom, diners FROM money where id = '".$id_cod."'"; 
			$result = mysqli_query($con ,$sql);	
			if ($result){
		//		echo "Succefulled !! 2 <br>";
				if (mysqli_num_rows($result)>0){
					$row = mysqli_fetch_assoc($result);
					$id_nom = $row["nom"];
					$id_val = $row["diners"];
		//			echo "Prova Té valor--> ".$id_val;
		//			echo "Prova Té nom--> ".$id_nom;
				}else{
					echo "ERROR : Num rows = ".(mysqli_num_rows($result));
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
	

	if ($bbddOk == 1)
	{
		$res=array();
		$res[0]= $id_cod;
		$res[1]= $id_nom;
		$res[2]= $id_val;
		echo("#id:".$res[0]."#nom:".$res[1]."#diners:".$res[2]);	
	}else{
		echo "Hi ha hagut algun error: Codi d'error  ".$bbddOkb;
	}
?>