<?php


//$numero2= count($_POST);
//$id_sensor_array=array_keys($_POST);

$id_sensor_array=$_POST['sensorito'];

session_start();
$login= $_SESSION['login'];

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);


$sql="UPDATE Sensores SET Borrado=1 WHERE ID_Sensor='".$id_sensor_array. "' and Login='".$login. "';";

echo $sql;
$resultados = mysqli_query($conexion,$sql);

mysqli_close($conexion);

header("Location: creasensores.php");


?>

 


