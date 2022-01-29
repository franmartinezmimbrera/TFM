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

   if( $_SESSION['lenguaje']=="ES"){
  
      echo "<div class='header'><a class='logo'> <img src='logo.png'> Herramienta software para análisis descriptivo de flujo de datos de sensores através de protoformas difusas </a> </div>";
      echo "<div class='usu'><p align='right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='cerrar.png'></a></p></div>";
  
  }
  else{
      echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
      echo "<div class='usu'><p align='right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></p></div>";
  
  }

?>


      
<?php
  if( $_SESSION['lenguaje']=="ES"){


   echo "   <div class='principal'>";
   echo " <h1> Creación de elementos a utilizar en el marco de trabajo </h1>";
   echo " <p><b> Menú de opciones </b></p>";
      echo" <p><input type='button' onclick=\"location.href='creasensores.php';\" value='Definición de sensores' style='width:520px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
      echo "<p><input type='button' onclick=\"location.href='creavariables.php';\" value='Definición de Variables Lingüísticas y Términos' style='width:430px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
      echo "<p><input type='button' onclick=\"location.href='crearventanas.php';\" value='Definición de Ventanas Temporales' style='width:650px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
      echo "<p><input type='button' onclick=\"location.href='crearprotoformas.php';\" value='Definición de Protoformas Difusas' style='width:650px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
      echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
  }
  else{

    echo "   <div class='principal'>";
    echo " <h1> Creation of elements to be used in the framework </h1>";
    echo " <p><b> Options Menu </b></p>";

    echo" <p><input type='button' onclick=\"location.href='creasensores.php';\" value='Sensors Definition' style='width:520px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
    echo "<p><input type='button' onclick=\"location.href='creavariables.php';\" value='Fuzzy Linguistics Variables and Terms definition' style='width:430px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
    echo "<p><input type='button' onclick=\"location.href='crearventanas.php';\" value='Temporal Windows Definition' style='width:650px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
    echo "<p><input type='button' onclick=\"location.href='crearprotoformas.php';\" value='Fuzzy Protoforms Definition' style='width:650px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";


  }  
  
  ?>
</div>

<?php

   if( $_SESSION['lenguaje']=="ES"){
    echo "<div class='footer'> <a class='logo'><img src='logoasia.png'>Grupo de Investigación ASIA - Universidad de Jaén" ;
   }
   else{
    echo "<div class='footer'> <a class='logo'><img src='logoasia.png'>ASIA Research Group  - University of Jaén" ;
   }
?>  
  <a href="https://asia.ujaen.es"> https://asia.ujaen.es </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a> 
  <a class="logo2"> Copyright 2021 - Francisco Jesús Martínez Mimbrera </a> 
    
</div>
</body>
</html>