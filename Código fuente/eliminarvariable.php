<?php


$vari=$_POST['descripT'];

session_start();
$login= $_SESSION['login'];

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);


$sql="UPDATE VariablesLingüísticas SET Borrado=1 WHERE Nombre='".$vari. "' and Login='".$login. "';";
$resultados = mysqli_query($conexion,$sql);

echo $sql;

$sql="UPDATE TérminosLingüísticos SET borrado=1 WHERE NombreVL='".$vari. "' and Login='".$login. "';";
$resultados = mysqli_query($conexion,$sql);

echo $sql;

mysqli_close($conexion);

header("Location: creavariables.php");


?>

 


