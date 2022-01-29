<?php

session_start();
$login= $_SESSION['login'];

$idusuario=$_POST['Login'];
$passwordusu=$_POST['Password'];
$nombreusu=$_POST['Nombre'];
$apeusu=$_POST['Apellidos'];
$mailusu=$_POST['Email'];
$tip=$_POST['tipo'];


$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);


$sql="SELECT * FROM Usuarios WHERE Login='".$idusuario."';";


$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);


if ($rowcount==0){

$sql="INSERT INTO Usuarios (Login,Password,Nombre,Apellidos,Email,Tipo) VALUES ('".$idusuario. "','".$passwordusu."','".$nombreusu."','".$apeusu."','".$mailusu."','".$tip."');";

$resultados = mysqli_query($conexion,$sql);


}
else{
    $fila= mysqli_fetch_array($resultados);
    if ($rowcount==1 || $fila['Borrado']==1){
        $sql="UPDATE Usuarios SET Borrado=0 , Nombre='".$nombreusu."', Apellidos='".$apeusu."', Email='".$mailusu."',Tipo=".$tip."  WHERE Login='".$idusuario. "';";
        $resultados = mysqli_query($conexion,$sql);
    }

}

mysqli_close($conexion);

header("Location: crearusuarios.php");


?>

 


