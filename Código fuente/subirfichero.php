
<?php

session_start();
$login= $_SESSION['login'];


    
$nombrecon=$_POST['nombreconjunto'];
$tipo=$_POST['Tipo'];
$bbdd=$_POST['BBDD'];

if ($tipo=="HISTÓRICO"){
    $dir_subida = '/var/www/html/uploads/';
    $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
}


$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM ConjuntosDatos WHERE Login='".$login."' and Nombre='".$nombrecon."';";



$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);
    

if ($rowcount==0){

    if ($tipo=="HISTÓRICO"){

        move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido);
    }
    $sql="INSERT INTO ConjuntosDatos (Nombre,Ruta,Login,Tipo,DatosBBDD) VALUES ('".$nombrecon. "','".$fichero_subido. "','".$login."','".$tipo."','".$bbdd."');";
    echo $sql;
    
    $resultados = mysqli_query($conexion,$sql);
    
    
}
else{
    $fila= mysqli_fetch_array($resultados);
    if ($rowcount==1 && $fila['borrado']==1){
        $sql="UPDATE ConjuntosDatos SET borrado=0,Ruta='".$fichero_subido."', Nombre='".$nombrecon."' WHERE Nombre='".$nombrecon. "' and Login='".$login. "';";
        echo $sql;
        $resultados = mysqli_query($conexion,$sql);
    }

}


mysqli_close($conexion);
    
header("Location: cargarconjuntos.php");


?>
