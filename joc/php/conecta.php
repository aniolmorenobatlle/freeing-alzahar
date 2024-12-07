<?php 

	$conexion = mysqli_connect("localhost","grup14","!!oIag!*]nAF4yW)","grup14");

?>


<!DOCTYPE html>
<html>
<body>

	<br>

		<?php 
			$sql="SELECT * from users where username = '.$nom'";
			$result=mysqli_query($conexion,$sql);
			while($mostrar=mysqli_fetch_array($result)){
		?>
			<p><?php echo $mostrar['username'] ?></p>
			<p>Tens <?php echo $mostrar['monedes'] ?> monedes</p>
	<?php 
		}
	?>
</body>
</html>