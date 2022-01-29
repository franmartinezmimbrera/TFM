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
   echo "<div class='usu'><div><span style='float:right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='cerrar.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:240px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='creaelmarco.php';\" value='Volver al menú Creación de elementos' style='width:460px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'><h1> Sensores </h1>";


   echo"<center> <form action='insertasensor.php' method='post'>
     <label form='sensor'>ID SENSOR:</label>
     <input name='idsensor' type='text' required> 
     <label form='descri'>DESCRIPCIÓN:</label>
     <input name='descripcion' type='text' required> 
     <br><br>
     <label form='descri'>MÍNIMO VALOR:</label>
     <input name='min' type='number' step='any' required> 
     <label form='descri'>MÁXIMO VALOR:</label>
     <input name='max' type='number' step='any' required> 
     <br><br>
     <label form='descri'>INTERVALOS:</label>
     <input name='intervalos' type='number' step='any' required> 
     <label form='descri'>TIEMPO ENTRE MUESTRAS:</label>
     <input name='tmuestras' type='number' step='any' required> 
     <br><br>
     <input type='submit' value='INSERTAR'>
     </form>
   </center>";
 

  echo"<br></br>
  <table border='1px' align='center'>
  <tr>
  <th>ID SENSOR</th>
  <th>DESCRIPCIÓN</th>
  <th>MÁXIMO VALOR</th>
  <th>MÍNIMO VALOR</th>
  <th>INTERVALOS</th>
  <th>TIEMPO ENTRE MUESTRAS</th>
  <th>ELIMINAR</th>
 </tr>";


}
else{
   echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
   echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='creaelmarco.php';\" value='Creation of elements to be used in the framework' style='width:460px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

  echo"<div style='clear: both;'></div><div class='principal'><h1> Sensors </h1>";


  echo"<center> <form action='insertasensor.php' method='post'>
  <label form='sensor'>ID SENSOR:</label>
  <input name='idsensor' type='text' required> 
  <label form='descri'>DESCRIPTION:</label>
  <input name='descripcion' type='text' required> 
  <br><br>
  <label form='descri'>MIN VALUE:</label>
  <input name='min' type='number' step='any' required> 
  <label form='descri'>MAX VALUE:</label>
  <input name='max' type='number' step='any' required> 
  <label form='descri'>INTERVALS:</label>
  <input name='intervalos' type='number' step='any' required> 
  <label form='descri'>TIME BETWEEN SAMPLES:</label>
  <input name='tmuestras' type='number' step='any' required> 
  <br><br>
  <input type='submit' value='INSERT'>
  </form>
   </center>";


 echo"<br></br>
 <table border='1px' align='center'>
 <tr>
 <th>ID SENSOR</th>
 <th>DESCRIPTION</th>
 <th>MAX VALUE</th>
 <th>MIN VALUE</th>
 <th>INTERVALS</th>
 <th>TIME BETWEEN SAMPLES</th>
 <th>DELETE</th>
  </tr>";

}

?>

  <?php
 
 
  $conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

  mysqli_select_db($conexion,$_SESSION['db']);

  $sql="SELECT * FROM Sensores WHERE Login='".$_SESSION['login']."' and Borrado=0;";
  $resultados = mysqli_query($conexion,$sql);
  ?>

<br></br>


 <?php  while ($registro=mysqli_fetch_array($resultados)) {?>
 <tr>
  <td><?php echo $registro['ID_Sensor'];?></td>
  <td><?php echo $registro['Descripcion']; ?></td>
  <td><?php echo $registro['max'];?></td>
  <td><?php echo $registro['min']; ?></td>
  <td><?php echo $registro['intervalos'];?></td>
  <td><?php echo $registro['tmuestra'];?></td>
  <td>
  <form action="eliminasensor.php" method="post">
    <?php 
          if( $_SESSION['lenguaje']=="ES"){
            echo "<input value='".$registro['ID_Sensor']."' type='hidden' name='sensorito'>";
            echo "<input type='submit'  value='Eliminar' >"; 
          }
          else{
            echo "<input value='".$registro['ID_Sensor']."' type='hidden' name='sensorito'>";
            echo "<input type='submit'  value='Delete' >"; 
          }
    ?>  
  </form>

</td>
 </tr>
 
 <?php
 }  mysqli_close($conexion);?>
 </table>

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