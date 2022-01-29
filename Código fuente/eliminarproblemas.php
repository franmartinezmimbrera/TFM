<?php


$idpro=$_POST['idpro'];


session_start();
$login= $_SESSION['login'];

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);


$sql="UPDATE Problemas SET Borrado=1 WHERE ID=".$idpro.";";

echo $sql;
$resultados = mysqli_query($conexion,$sql);

//OJO BORRAR TAMBIÉN LOS MARCOS DE CADA PROBLEMA


mysqli_close($conexion);

header("Location: definirproblema.php");


?>

 


