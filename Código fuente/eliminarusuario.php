<?php


$numero2= count($_POST);
$idusuario=array_keys($_POST);

session_start();
$login= $_SESSION['login'];

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);


$sql="UPDATE Usuarios SET Borrado=1 WHERE Login='".$idusuario[0]."';";


$resultados = mysqli_query($conexion,$sql);

mysqli_close($conexion);

header("Location: crearusuarios.php");


?>

 


