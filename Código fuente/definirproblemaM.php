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

$_SESSION['IDP']="";


   $proto=$_POST['idpro'];
   $conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

   mysqli_select_db($conexion,$_SESSION['db']);
 
   $sql="SELECT * FROM Problemas WHERE Login='".$_SESSION['login']."' and ID=".$proto.";";
  
   $resultados = mysqli_query($conexion,$sql);
   $registro2=mysqli_fetch_array($resultados);
 


if( $_SESSION['lenguaje']=="ES"){

   echo "<div class='header'><a class='logo'> <img src='logo.png'> Herramienta software para análisis descriptivo de flujo de datos de sensores através de protoformas difusas </a> </div>";
   echo "<div class='usu'><div><span style='float:right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='cerrar.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'><h1> MODIFICAR Definición de Problemas, Marcos de trabajo </h1>";



   echo "<center>
   <form action='insertarproblemas.php' method='post'>
     <label form='varia'>DESCRIPCIÓN PROBLEMA:</label>
     <br><br>
     <textarea name='nombreproblema' rows=4 cols='40'>". $registro2["DESCRIPCION"]. "</textarea>"; 
     
     echo"<input type='hidden' name='idpro' value=".  $registro2['ID']. ">  
    
     <br><br>
 
     <input type='submit' value='MODIFICAR'>
   
     </form>
   </center>";


 echo"  <table border='1px' align='center'>
   <tr>
    <th>ID PROBLEMA</th>
    <th>DESCRIPCIÓN PROBLEMA</th>
    <th>ACCIONES</th>
   </tr>";
     


}
else{
   echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
   echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";


  echo"<div style='clear: both;'></div><div class='principal'><h1> MODIFY PROBLEMS DESCRIPTION AND FRAMEWORK DEFINITIONS </h1>";


  echo "<center>
   <form action='insertarproblemas.php' method='post'>
     <label form='varia'>PROBLEM DESCRIPTION:</label>
     <br><br>
     <textarea name='nombreproblema' rows=4 cols='40'>". $registro2["DESCRIPCION"]. "</textarea>"; 
     
     echo"<input type='hidden' name='idpro' value=".  $registro2['ID']. ">  
    
     <br><br>
 
     <input type='submit' value='MODIFY'>
   
     </form>
   </center>";


echo"  <table border='1px' align='center'>
  <tr>
   <th>PROBLEM ID</th>
   <th>PROBLEM DESCRIPTION</th>
   <th>ACTIONS</th>
  </tr>";
    


}

 
  $conexion2 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

  mysqli_select_db($conexion2,$_SESSION['db']);

  $sql="SELECT * FROM Problemas WHERE Login='".$_SESSION['login']."' and Borrado=0;";

  $resultados2 = mysqli_query($conexion2,$sql);

 
?>

<br></br>


 <?php  while ($registro=mysqli_fetch_array($resultados2)) {
   ?>
 <tr>
  <td><?php echo $registro['ID'];?></td>
  <td><?php echo $registro['DESCRIPCION'];?></td>
  <td>

  <?php
      if( $_SESSION['lenguaje']=="ES"){

       echo" <form action='crearmarcosproblemas.php' method='post'>
        <input type='hidden' name='idpro' value=". $registro['ID'].">";  
        echo "<input type='submit'  value='Marcos de trabajo - Resolver' >  
      </form>";
      echo"<form action='definirproblemaM.php' method='post'>
        <input type='hidden' name='idpro' value=". $registro['ID']. ">";  
      echo "<input type='submit'  value='Modificar Problema' >  
      </form>";
      echo"<form action='eliminarproblemas.php' method='post'>
        <input type='hidden' name='idpro' value=". $registro['ID']. ">";  
      echo "<input type='submit'  value='Eliminar' >  
      </form>";

      }

      else{

        echo" <form action='crearmarcosproblemas.php' method='post'>
        <input type='hidden' name='idpro' value=". $registro['ID'].">";  
        echo "<input type='submit'  value='Framework - Solve' >  
      </form>";
      echo"<form action='definirproblemaM.php' method='post'>
        <input type='hidden' name='idpro' value=". $registro['ID']. ">";  
      echo "<input type='submit'  value='Modify Problem' >  
      </form>";
      echo"<form action='eliminarproblemas.php' method='post'>
        <input type='hidden' name='idpro' value=". $registro['ID']. ">";  
      echo "<input type='submit'  value='Delete' >  
      </form>";

      }
   ?>
  </td>
 </tr>
 
 <?php
 }  mysqli_close($conexion);mysqli_close($conexion2);?>
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