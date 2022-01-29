<?php


$vari=$_POST['descrip'];

session_start();
$login= $_SESSION['login'];

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);


$sql="UPDATE Protoformas SET borrado=1 WHERE Nombre='".$vari. "' and Login='".$login. "';";
$resultados = mysqli_query($conexion,$sql);



mysqli_close($conexion);

header("Location: crearprotoformas.php");


?>

 


