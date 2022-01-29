<?php



$ventanuco=$_POST['descrip'];

session_start();
$login= $_SESSION['login'];

$idp=$_POST['idp'];
$p=$_POST['np'];
$cd=$_POST['idcd'];
$s=$_POST['idsensor'];

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);


$sql="DELETE FROM MarcoDeTrabajo  WHERE ID_CD=".$cd." and ID_Problema=".$idp." and NombreP='".$p."' and ID_SENSOR='".$s."' and Login='".$login."';";
echo $sql;
$resultados = mysqli_query($conexion,$sql);


mysqli_close($conexion);

header("Location: crearmarcosproblemas.php");


?>

 


