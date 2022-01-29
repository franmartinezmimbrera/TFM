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
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'><h1> CONJUNTOS DE DATOS </h1>";


  echo"<center>
   <form action='subirfichero.php' method='post' enctype='multipart/form-data'>
    <p> <label form='varia'>NOMBRE CONJUNTO:</label>
     <input name='nombreconjunto' type='text'> </p>
     <label form='varia'>FICHERO:</label>
     <input name='fichero_usuario' type='file' />
     <br><br>
     <label form='varia'>Tipo:</label>
     <select name='Tipo'>
         <option value='TIEMPO REAL'>TIEMPO REAL</option>
         <option value='HISTÓRICO' selected>HISTÓRICO</option>
    </select>
     <br><br>
     <label form='varia'>DATOS CONEXIÓN BASE DE DATOS</label>
     <br><br>
     <textarea name='BBDD' rows=4 cols='40'></textarea> 
     <br><br>
     <input type='submit' value='INSERTAR'>
     </form>
   </center>";
 

  echo" <table border='1px' align='center'>
   <tr>
    <th>NOMBRE CONJUNTO</th>
    <th>RUTA</th>
    <th>TIPO</th>
    <th>DATOS BBDD</th>
    <th>ACCIONES</th>
   </tr>";
   


}
else{
   echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
   echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";


  echo"<div style='clear: both;'></div><div class='principal'><h1> DATA SETS </h1>";


  echo"<center>
   <form action='subirfichero.php' method='post' enctype='multipart/form-data'>
    <p> <label form='varia'>DATA SET NAME:</label>
     <input name='nombreconjunto' type='text'> </p>
     <label form='varia'>FILE PATH:</label>
     <input name='fichero_usuario' type='file' />
     <br><br>
     <label form='varia'>Type:</label>
     <select name='Tipo'>
         <option value='TIEMPO REAL'>REAL TIEM</option>
         <option value='HISTÓRICO' selected>HISTORICAL</option>
    </select>
    <label form='varia'>DATA BASE CONECTION DATA</label>
    <br><br>
     <br><br>
     <textarea name='BBDD' rows=4 cols='40'></textarea> 
     <br><br>
     <input type='submit' value='INSERT'>
     </form>
   </center>";
 

  echo" <table border='1px' align='center'>
   <tr>
    <th>DATA SET NAME</th>
    <th>PATH</th>
    <th>TYPE</th>
    <th>DATABASE</th>
    <th>ACTIONS</th>
   </tr>";


}

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT * FROM ConjuntosDatos WHERE Login='".$_SESSION['login']."' and Borrado=0;";
$resultados = mysqli_query($conexion,$sql);

?>

<br></br>


<?php  while ($registro=mysqli_fetch_array($resultados)) {?>
 <tr>
  <td><?php echo $registro['Nombre'];?></td>
  <td><?php echo $registro['Ruta'];?></td>
  <td><?php echo $registro['Tipo'];?></td>
  <td><?php echo $registro['DatosBBDD'];?></td>
  <td>
  <form action="eliminarconjuntos.php" method="post">
    <?php
      if( $_SESSION['lenguaje']=="ES"){
        echo"<input type='hidden' name='descrip' value=". $registro['ID']. ">";  
        echo "<input type='submit'  value='Eliminar' >";  
      }
      else{
        echo"<input type='hidden' name='descrip' value=". $registro['ID']. ">";  
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