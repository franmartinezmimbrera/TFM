<?php

session_start();
$login= $_SESSION['login'];

$nombre=$_POST['nombreproblema'];
$id=$_POST['idpro'];

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);


if ($id==-1){

$sql="INSERT INTO Problemas (DESCRIPCION,Login) VALUES ('".$nombre. "','".$login."');";

echo $sql;

$resultados = mysqli_query($conexion,$sql);

}
else{

    $sql="UPDATE Problemas SET DESCRIPCION='".$nombre."' WHERE LOGIN='".$login."' AND ID=".$id.";";

    echo $sql;
    
    $resultados = mysqli_query($conexion,$sql);
    

}

mysqli_close($conexion);

header("Location: definirproblema.php");


?>

 


