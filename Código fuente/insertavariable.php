<?php

session_start();
$login= $_SESSION['login'];

$nombre=$_POST['nombrevariable'];


$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM VariablesLingüísticas WHERE Login='".$login."' and Nombre='".$nombre."';";

$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);


if ($rowcount==0){

$sql="INSERT INTO VariablesLingüísticas (Nombre,Login) VALUES ('".$nombre. "','".$login."');";
echo $sql;

$resultados = mysqli_query($conexion,$sql);


}
else{
    $fila= mysqli_fetch_array($resultados);
    if ($rowcount==1 && $fila['Borrado']==1){
        $sql="UPDATE VariablesLingüísticas SET Borrado=0  WHERE Nombre='".$nombre. "' and Login='".$login. "';";
        echo $sql;
        $resultados = mysqli_query($conexion,$sql);
    }

}

mysqli_close($conexion);

header("Location: creavariables.php");


?>

 


