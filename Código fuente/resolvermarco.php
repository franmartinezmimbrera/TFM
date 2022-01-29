<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="description" content="Herramienta protoformas" />
<meta name="keywords" content="Protoformas difusas, análisis descriptivo" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
   session_start();
   if( $_SESSION['lenguaje']=="ES"){
    echo "<title>Herramienta software para análisis descriptivo</title>";
   }
   else{
    echo "<title>Software tool for descriptive analysis</title>";
   }
   
?>

<link rel="stylesheet" href="hoja.css" />
</head>
<body>

<?php 

$conexion22 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion22,$_SESSION['db']);

 
 $idp=$_POST['idpro'];
 $p=$_POST['np'];
 $cd=$_POST['idcd'];
 $s=$_POST['idsensor'];

 $sqla="SELECT * FROM Problemas WHERE Login='".$_SESSION['login']."' and Borrado=0 and ID=".$idp.";";


  $conexion3 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");
 
  mysqli_select_db($conexion3,$_SESSION['db']);

  $conexion2 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion2,$_SESSION['db']);

 $conexion4 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion4,$_SESSION['db']);


  $sql="SELECT * FROM Protoformas WHERE Login='".$_SESSION['login']."' and Nombre='".$p."' and Borrado=0;";
  $resultados = mysqli_query($conexion2,$sql);
 
  $sql="SELECT * FROM ConjuntosDatos WHERE Login='".$_SESSION['login']."' and ID=".$cd." and Borrado=0;";
  $resultados2 = mysqli_query($conexion4,$sql);
 
  $sql="SELECT * FROM Sensores WHERE Login='".$_SESSION['login']."' and ID_SENSOR='".$s."' and Borrado=0;";
  $resultados3 = mysqli_query($conexion3,$sql);
 

if( $_SESSION['lenguaje']=="ES"){

echo "<div class='header'><a class='logo'> <img src='logo.png'> Herramienta software para análisis descriptivo de flujo de datos de sensores através de protoformas difusas </a> </div>";
echo "<div class='usu'><div><span style='float:right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='cerrar.png'></a></span></div>";
echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
echo "<input type='button' onclick=\"location.href='definirproblema.php';\" value='Definición de problemas y marcos de trabajo a resolver' style='width:510px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

echo"<div style='clear: both;'></div><div class='principal'>";


echo"<h1> Problema Nº: ". $IDP ."</h1>

<h2> Definición del problema</h2>";

$probl = mysqli_query($conexion22,$sqla);
#while ($registro=mysqli_fetch_array($resultados)){
foreach ($probl as $r):
     echo $r['DESCRIPCION']; 
   endforeach;

  
   echo "<h2> Marco de Trabajo aplicado</h2>";
   foreach ($resultados as $r):
    echo "<p>Variable Lingüística: ".$r['VLingüistica']; 
    echo "--- Término Lingüístico: ".$r['TLinguistico']."</p>";
    echo "Ventana Termporal: ".$r['VTemporal'];
    echo "--- Cuantificador Lingüístico: ".$r['QLingüístico'];
  endforeach;
    
  
     mysqli_close($conexion2);
     mysqli_close($conexion3);
     mysqli_close($conexion22);
     mysqli_close($conexion4);
  

echo "<h1> RESULTADOS MARCO DE TRABAJO </h1>";

 
     $command = escapeshellcmd("python3 /var/www/html/ResolverProblema.py ".$p." ".$cd." ".$s);
     $output = system($command,$ret);
    
     echo "<br></br>";
   
 

}
else{
echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span></div>";
echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
echo "<input type='button' onclick=\"location.href='definirproblema.php';\" value='Problem definitions and framework' style='width:510px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

echo"<div style='clear: both;'></div><div class='principal'>";


echo"<h1> Problem Nº: ". $IDP ."</h1>

<h2> Problem Definition</h2>";


$probl = mysqli_query($conexion22,$sqla);
foreach ($probl as $r):
     echo $r['DESCRIPCION']; 
   endforeach;


   echo "<h2> Framework used</h2>";
   foreach ($resultados as $r):
    echo "<p>Linguistic Variable: ".$r['VLingüistica']; 
    echo "--- Linguistic Term: ".$r['TLinguistico']."</p>";
    echo "Temporal Fuzzy Window: ".$r['VTemporal'];
    echo "--- Linguistic Cuantificator: ".$r['QLingüístico'];
  endforeach;
    
  
     mysqli_close($conexion2);
     mysqli_close($conexion3);
     mysqli_close($conexion22);
     mysqli_close($conexion4);
  

     echo "<h1> RESULTS OF FRAMEWORK </h1>";

 
     $command = escapeshellcmd("python3 /var/www/html/web/ResolverProblema.py ".$p." ".$cd." ".$s);
     $output = system($command,$ret);
    
     echo "<br></br>";
  

}

?>
 
</div>


</div>

</body>
</html>