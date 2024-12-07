<!DOCTYPE html>
<html lang="ca">

<?php
  session_start();
  $out = '';
  $headto = 'index.php'; // Originalmente, te redirigirá a la página de inicio.

  if( ! isset( $_GET['submitBtn'] ) ) { // Esto sirve si es que por algún motivo se ingresó la URL tusitioweb.algo/login.php, de lo contrario cualquier podría iniciar sesión.
    if( isset( $_GET['users'] ) && ! empty( $_GET['users'] ) &&
        isset( $_GET['password'] ) && ! empty( $_GET['password'] ) ) {
      $user = filter_var( $_GET['users'], FILTER_SANTIZE_STRING ); // Limpiar la variable para prevenir inyección de código.
      $pass = $_GET['password'];

      include_once "configuracion.php";
      $con = mysql_connect( $dbhost, $dbuser, $dbpass ); // Sin comillas. Usa comillas sólo para envolver palabras, no variables.
      mysql_select_db( $db, $con );
      $query = "SELECT * FROM users WHERE username = '$user'";
      $result = mysql_query( $query, $con );
      
      if( mysql_num_rows( $result ) == 1 ) { // Si se devolvió una fila, entonces el usuario existe
        $assoc = mysql_fetch_assoc( $result );
        if( $pass == $assoc['contrasena'] ) {
          $_SESSION['logged_in'] = true;
          $_SESSION['user_name'] = $assoc['username'];
        } else {
          $out .= 'Contraseña incorrecta';
        }
      } else { // Si se devolvieron 0 o más de una fila, entonces el usuario no existe o la tabla esta mal hecha.
        $headto = 'register.php'; // El usuario no existe, entonces se envía a la página de registro.
      }

      mysql_free_result( $result );
      mysql_close( $con );
    } else {
      $out .= "Ingrese una contraseña y un usuario válidos.";
    }
  }

  if( ! empty( $out ) )
    $headto .= '?msg=' . urlencode( $out );

  header( "Location: $headto" );
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
