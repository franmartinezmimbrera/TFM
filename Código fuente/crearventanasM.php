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

$ventanita= $_POST['vent'];

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

  mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM VentanasTemporales WHERE NVentana='".$ventanita."';";
$resultados = mysqli_query($conexion,$sql);
$registro=mysqli_fetch_array($resultados);

if( $_SESSION['lenguaje']=="ES"){

   echo "<div class='header'><a class='logo'> <img src='logo.png'> Herramienta software para análisis descriptivo de flujo de datos de sensores através de protoformas difusas </a> </div>";
   echo "<div class='usu'><div><span style='float:right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='cerrar.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:240px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='creaelmarco.php';\" value='Volver al menú Creación de elementos' style='width:460px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'><h1> Ventanas Temporales </h1>";


  echo" <center>
   <form action='insertarventana.php' method='post'>
     <label form='varia'>NOMBRE VENTANA:</label>
     <input name='nombreventana' type='text' required value='".$registro['NVentana']."'> 
     <label form='varia'>VALOR A:</label>
     <input name='a' type='number' step='any' required value='".$registro['A']."'> 
     <label form='varia'>VALOR B:</label>
     <input name='b' type='number' step='any' required value='".$registro['B']."'> 
     <label form='varia'>VALOR C:</label>
     <input name='c' type='number' step='any' required value='".$registro['C']."'> 
     <label form='varia'>VALOR D:</label>
     <input name='d' type='number' step='any' required value='".$registro['D']."'> 
     <br><br>
     <label form='varia'>TIEMPO TJ:</label>
     <input name='tj' type='number' step='any' required value='".$registro['Tiempo']."'> 
     <br><br>
     <input type='submit' value='MODIFICAR'>
     </form>
   </center>";

 echo"<table border='1px' align='center'>
 <tr>
  <th>NOMBRE VENTANA TEMPORAL</th>
  <th>VALOR A</th>
  <th>VALOR B</th>
  <th>VALOR C</th>
  <th>VALOR D</th>
  <th>VALOR TIEMPO TJ</th>
  <th>ACCIONES</th>
 </tr>";




}
else{
   echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
   echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='creaelmarco.php';\" value='Creation of elements to be used in the framework' style='width:460px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

  echo"<div style='clear: both;'></div><div class='principal'><h1> Fuzzy Temporal Windows </h1>";

  echo" <center>
   <form action='insertarventana.php' method='post'>
     <label form='varia'>WINDOWS NAME:</label>
     <input name='nombreventana' type='text' required value='".$registro['NVentana']."'> 
     <label form='varia'>A VALUE:</label>
     <input name='a' type='number' step='any' required value='".$registro['A']."'> 
     <label form='varia'>B VALUE:</label>
     <input name='b' type='number' step='any' required value='".$registro['B']."'>  
     <label form='varia'>C VALUE:</label>
     <input name='c' type='number' step='any' required value='".$registro['C']."'> 
     <label form='varia'>D VALUE:</label>
     <input name='d' type='number' step='any' required value='".$registro['D']."'> 
     <br><br>
     <label form='varia'>TJ TIME:</label>
     <input name='tj' type='number' step='any' required value='".$registro['Tiempo']."'>  
     <br><br>
     <input type='submit' value='MODIFY'>
     </form>
   </center>";

 echo"<table border='1px' align='center'>
 <tr>
  <th>TEMPORAL FUZZY WINDOWS NAME</th>
  <th>A VALUE</th>
  <th>B VALUE</th>
  <th>C VALUE</th>
  <th>D VALUE</th>
  <th>TJ TIME VALUE</th>
  <th>ACTIONS</th>
 </tr>";

}

?>


  <?php
 
 
  $conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

  mysqli_select_db($conexion,$_SESSION['db']);

  $sql="SELECT * FROM VentanasTemporales WHERE Login='".$_SESSION['login']."' and Borrado=0;";
  $resultados = mysqli_query($conexion,$sql);
  ?>

<br></br>


 <?php  while ($registro=mysqli_fetch_array($resultados)) {?>
 <tr>
  <td><?php $ventanita=$registro['NVentana'];echo $registro['NVentana'];?></td>
  <td><?php echo $registro['A'];?></td>
  <td><?php echo $registro['B'];?></td>
  <td><?php echo $registro['C'];?></td>
  <td><?php echo $registro['D'];?></td>
  <td><?php echo $registro['Tiempo'];?></td>
  <td>
  <form action="crearventanasM.php" method="post">
    <?php 
         if( $_SESSION['lenguaje']=="ES"){
           echo " <input type='hidden' name='vent' value='". $ventanita . "'>";  
           echo "<input type='submit'  value='Modificar' >";  
        }
        else{
          echo " <input type='hidden' name='vent' value='". $ventanita . "'>";  
          echo "<input type='submit'  value='Modify' >";  
        }
    ?>  
  </form>  

  <form action="eliminarventana.php" method="post">
    <?php 
         if( $_SESSION['lenguaje']=="ES"){
           echo " <input type='hidden' name='descrip' value='". $ventanita . "'>";  
           echo "<input type='submit'  value='Eliminar' >";  
        }
        else{
          echo " <input type='hidden' name='descrip' value='". $ventanita . "'>";  
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


<div class="footer">
  <a class="logo"><img src="logoasia.png">Grupo de Investigación ASIA - Universidad de Jaén <a href="https://asia.ujaen.es"> https://asia.ujaen.es </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a> 
  <a class="logo2"> Copyright 2021 - Francisco Jesús Martínez Mimbrera </a> 
    
</div>
</body>
</html>