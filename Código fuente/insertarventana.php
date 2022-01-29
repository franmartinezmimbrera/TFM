<?php

session_start();
$login= $_SESSION['login'];

$nombre=$_POST['nombreventana'];

$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$tiempo=$_POST['tj'];


$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM VentanasTemporales WHERE Login='".$login."' and NVentana='".$nombre."';";



$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);
    

if ($rowcount==0){

    $sql="INSERT INTO VentanasTemporales (NVentana,A,B,C,D,Login,Tiempo) VALUES ('".$nombre. "','".$a. "','".$b. "','".$c. "','".$d. "','".$login."','".$tiempo."');";
    echo $sql;
    
    $resultados = mysqli_query($conexion,$sql);
    
    
}
else{
    $fila= mysqli_fetch_array($resultados);
        $sql="UPDATE VentanasTemporales SET borrado=0 , A='".$a."',B='".$b."',C='".$c."',D='".$d."',Tiempo='".$tiempo."' WHERE NVentana='".$nombre. "' and Login='".$login. "';";
        echo $sql;
        $resultados = mysqli_query($conexion,$sql);

}


    mysqli_close($conexion);
    
    header("Location: crearventanas.php");
    

?>

 


