<?php

session_start();
$login= $_SESSION['login'];

$idp=$_POST['idp'];

$p=$_POST['nombrePT'];
$cd=$_POST['cdd'];
$s=$_POST['idsensor'];



$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM MarcoDeTrabajo WHERE Login='".$login."' and ID_CD=".$cd." and ID_Problema=".$idp." and NombreP='".$p."' and ID_SENSOR='".$s."' ;";



$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);
    


    $sql="INSERT INTO MarcoDeTrabajo (ID_CD,ID_Problema,NombreP,ID_SENSOR,Login) VALUES (".$cd.",".$idp.",'".$p. "','".$s."','".$login."');";
 
  
    $resultados = mysqli_query($conexion,$sql);
    
    

    mysqli_close($conexion);
    
 header("Location: crearmarcosproblemas.php");
    

?>

 


