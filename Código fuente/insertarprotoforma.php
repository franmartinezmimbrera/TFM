<?php

session_start();
$login= $_SESSION['login'];

$nombreproto=$_POST['nombreproto'];
$nombreVL=$_POST['nombreVL'];
$nombreTL=$_POST['nombreTL'];
$nombreVT=$_POST['nombreVT'];
$nombreQL=$_POST['nombreQL'];

//echo $nombreTL;


$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM Protoformas WHERE Login='".$login."' and Nombre='".$nombreproto."';";

$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);


if ($rowcount==0){

$sql="INSERT INTO Protoformas (Nombre,Login,VLingüistica,VTemporal,QLingüístico,TLinguistico) VALUES ('".$nombreproto. "','".$login."','".$nombreVL."','".$nombreVT."','".$nombreQL."','".$nombreTL."');";
echo $sql;

$resultados = mysqli_query($conexion,$sql);


}
else{
    $fila= mysqli_fetch_array($resultados);
    if ($rowcount==1 || $fila['Borrado']==1){
        $sql="UPDATE Protoformas SET Borrado=0,VLingüistica='".$nombreVL."',VTemporal='".$nombreVT."',QLingüístico='".$nombreQL."',TLinguistico='".$nombreTL."'  WHERE Nombre='".$nombreproto. "' and Login='".$login. "';";
        echo $sql;
        $resultados = mysqli_query($conexion,$sql);
    }

}

mysqli_close($conexion);

header("Location: crearprotoformas.php");


?>

 


