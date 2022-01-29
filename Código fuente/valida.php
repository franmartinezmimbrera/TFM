<?php

$dbhost='*******';  
$dbusuario='******'; 
$dbpassword='*********'; 
$db='**********';       

$conexion = mysqli_connect($dbhost, $dbusuario, $dbpassword) or die("No conecta la mierda esta");

mysqli_select_db($conexion,$db);

$login= $_POST['login'];
$password= $_POST['password'];
$lenguaje= $_POST['lan'];

$sql="SELECT * FROM Usuarios WHERE Login='".$login."' and Password='".$password."';";


$resultados = mysqli_query($conexion,$sql);
$rowcount=mysqli_num_rows($resultados);

if ($rowcount==1){
    session_start();
    $_SESSION['login'] = $login;
    $fila= mysqli_fetch_array($resultados);
    $_SESSION['tipo_usuario']=$fila['Tipo'];
    $_SESSION['dbhost']=$dbhost;
    $_SESSION['dbusuario']=$dbusuario;
    $_SESSION['dbpassword']=$dbpassword;
    $_SESSION['db']=$db;
    $_SESSION['lenguaje']=$lenguaje;

    header("Location: principal.php");
    exit;
}
else{
    if ($lenguaje=="ES"){
        header("Location: login_error.php");
    }
    else{
        header("Location: login_errorI.php");
    }

    exit;
}


mysqli_close($conexion);

?>
