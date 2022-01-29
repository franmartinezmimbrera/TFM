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


<div class="principal">
<?php
    if ($_SESSION['tipo_usuario']==1){

          if( $_SESSION['lenguaje']=="ES"){
            
            echo "Bienvenido a la Herramienta para análisis predictivo - Admin";
            echo "<p><b> Menú de opciones</b></p>";
            echo "<p><input type='button' onclick=\"location.href='crearusuarios.php';\" value='Creación de usuarios' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
            echo "<p><input type='button' onclick=\"location.href='creaelmarco.php';\" value='Creación de elementos a utilizar en el marco de trabajo' style='width:520px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
            echo "<p><input type='button' onclick=\"location.href='cargarconjuntos.php';\" value='Carga de Conjuntos de Datos de Sensores' style='width:430px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
            echo "<p><input type='button' onclick=\"location.href='definirproblema.php';\" value='Definición de problemas y marcos de trabajo a resolver' style='width:650px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
          }
          else{
            echo "Welcome to the Predictive Analytics Tool - Admin";
            echo "<p><b> Options Menu</b></p>";
            echo "<p><input type='button' onclick=\"location.href='crearusuarios.php';\" value='User Creation' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
            echo "<p><input type='button' onclick=\"location.href='creaelmarco.php';\" value='Creation of elements to be used in the framework' style='width:520px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
            echo "<p><input type='button' onclick=\"location.href='cargarconjuntos.php';\" value='Loading of Sensor Data Sets' style='width:430px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
            echo "<p><input type='button' onclick=\"location.href='definirproblema.php';\" value='Definition of problems and frameworks to be solved' style='width:650px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
          }      
    }
    else{
      if( $_SESSION['lenguaje']=="ES"){
            
        echo "Bienvenido a la Herramienta para análisis predictivo - Admin";
        echo "<p><b> Menú de opciones</b></p>";
        echo "<p><input type='button' onclick=\"location.href='creaelmarco.php';\" value='Creación de elementos a utilizar en el marco de trabajo' style='width:520px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
        echo "<p><input type='button' onclick=\"location.href='cargarconjuntos.php';\" value='Carga de Conjuntos de Datos de Sensores' style='width:430px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
        echo "<p><input type='button' onclick=\"location.href='definirproblema.php';\" value='Definición de problemas y marcos de trabajo a resolver' style='width:650px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
      }
      else{
        echo "Welcome to the Predictive Analytics Tool - Admin";
        echo "<p><b> Options Menu</b></p>";
        echo "<p><input type='button' onclick=\"location.href='creaelmarco.php';\" value='Creation of elements to be used in the framework' style='width:520px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
        echo "<p><input type='button' onclick=\"location.href='cargarconjuntos.php';\" value='Loading of Sensor Data Sets' style='width:430px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
        echo "<p><input type='button' onclick=\"location.href='definirproblema.php';\" value='Definition of problems and frameworks to be solved' style='width:650px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p>";
      }      
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