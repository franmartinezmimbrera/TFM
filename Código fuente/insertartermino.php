<?php

session_start();
$login= $_SESSION['login'];

$nombre=$_POST['nombretermino'];

$nombreVL=$_POST['NombreVL'];

$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];



$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM TérminosLingüísticos WHERE Login='".$login."' and NombreT='".$nombre."' and NombreVL='".$nombreVL."' ;";



$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);
    

if ($rowcount==0){

    $sql="INSERT INTO TérminosLingüísticos (NombreT,NombreVL,A,B,C,D,Login) VALUES ('".$nombre. "','".$nombreVL. "','".$a. "','".$b. "','".$c. "','".$d. "','".$login."');";
    echo $sql;
    
    $resultados = mysqli_query($conexion,$sql);
    
    
}
else{
    $fila= mysqli_fetch_array($resultados);
    if ($rowcount==1 && $fila['borrado']==1){
        $sql="UPDATE TérminosLingüísticos SET borrado=0 , A='".$a."',B='".$b."',C='".$c."',D='".$d."' WHERE NombreT='".$nombre. "' and Login='".$login. "';";
        echo $sql;
        $resultados = mysqli_query($conexion,$sql);
    }

}


    mysqli_close($conexion);
    
    header("Location: crearterminos.php");
    

?>

 


