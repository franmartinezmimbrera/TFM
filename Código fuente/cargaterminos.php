<?php 
session_start();
$login= $_SESSION['login'];

$nombreVL=$_POST['vl'];
//$nombreVL="TEMPERATURA CORPORAL";

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT NombreT FROM TérminosLingüísticos WHERE Login='".$login."' and NombreVL='".$nombreVL."' and Borrado=0;";

$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);

while ($ver=mysqli_fetch_row($resultados)) {
	     echo "<option value='".utf8_encode($ver[0])."'>".utf8_encode($ver[0])."</option>";
		//$cadena=$cadena.'<option value='.utf8_encode($ver[0]).'>'.utf8_encode($ver[0]).'</option>';
	}

//echo $cadena;
?>