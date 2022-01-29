<?php

session_start();
$login= $_SESSION['login'];

$idsensor=$_POST['idsensor'];
$descripcion=$_POST['descripcion'];
$min=$_POST['min'];
$max=$_POST['max'];
$intervalos=$_POST['intervalos'];
$tmuestra=$_POST['tmuestras'];


$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM Sensores WHERE Login='".$login."' and Id_Sensor='".$idsensor."';";


$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);


if ($rowcount==0){

$sql="INSERT INTO Sensores (ID_Sensor,Descripcion,Login,max,min,intervalos,tmuestra) VALUES ('".$idsensor. "','".$descripcion."','".$login."',".$max.",".$min.",".$intervalos.",'".$tmuestra."');";
//echo $sql;
$resultados = mysqli_query($conexion,$sql);


}
else{
    $fila= mysqli_fetch_array($resultados);
    if ($rowcount==1 && $fila['Borrado']==1){
        $sql="UPDATE Sensores SET Borrado=0 , Descripcion='".$descripcion."', max=".$max.",min=".$min.",intervalos=".$intervalos.",tmuestra=".$tmuestra." WHERE ID_Sensor='".$idsensor. "' and Login='".$login. "';";
//        echo $sql;
        $resultados = mysqli_query($conexion,$sql);
    }

}

mysqli_close($conexion);

header("Location: creasensores.php");


?>

 


