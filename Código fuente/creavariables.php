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

$_SESSION['VL']="";
if( $_SESSION['lenguaje']=="ES"){

   echo "<div class='header'><a class='logo'> <img src='logo.png'> Herramienta software para análisis descriptivo de flujo de datos de sensores através de protoformas difusas </a> </div>";
   echo "<div class='usu'><div><span style='float:right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='cerrar.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:240px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='creaelmarco.php';\" value='Volver al menú Creación de elementos' style='width:460px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'><h1> Variables </h1>";


   echo "<center>
   <form action='insertavariable.php' method='post'>
     <label form='varia'>NOMBRE VARIABLE LINGÜÍSTICA:</label>
     <input name='nombrevariable' type='text'> 
     <br><br>
     <input type='submit' value='INSERTAR'>
     </form>
   </center>";
   
    echo"<br></br>
    <table border='1px' align='center'>
    <tr>
     <th>NOMBRE VARIABLE</th>
     <th>ACCIONES</th>
    </tr>";
   

}
else{
   echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
   echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='creaelmarco.php';\" value='Creation of elements to be used in the framework' style='width:460px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

  echo"<div style='clear: both;'></div><div class='principal'><h1> Variables </h1>";


  
echo "<center>
<form action='insertavariable.php' method='post'>
  <label form='varia'>LINGUISTIC VARIABLE NAME:</label>
  <input name='nombrevariable' type='text'> 
  <br><br>
  <input type='submit' value='INSERT'>
  </form>
</center>";

 echo"<br></br>
 <table border='1px' align='center'>
 <tr>
  <th>VAR NAME</th>
  <th>ACTIONS</th>
 </tr>";

}

?>

  <?php
 
 
  $conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

  mysqli_select_db($conexion,$_SESSION['db']);

  $sql="SELECT * FROM VariablesLingüísticas WHERE Login='".$_SESSION['login']."' and Borrado=0;";
  $resultados = mysqli_query($conexion,$sql);

 
?>

<br></br>

 <?php  while ($registro=mysqli_fetch_array($resultados)) {?>
 <tr>
  <td><?php echo $registro['Nombre'];?></td>
  <td>
  <form action="crearterminos.php" method="post">
    <?php 
          if( $_SESSION['lenguaje']=="ES"){
            echo "<input type='hidden' name='descripT' value='". $registro['Nombre']."'>";  
            echo "<input type='submit'  value='Añadir Términos' >"; 
          }
          else{
            echo "<input type='hidden' name='descripT' value='". $registro['Nombre']."'>";  
            echo "<input type='submit'  value='Add Terms' >"; 
          }
    ?>  
  </form>   <form action="eliminarvariable.php" method="post">
    <?php 
         if( $_SESSION['lenguaje']=="ES"){
          echo "<input type='hidden' name='descripT' value='". $registro['Nombre']."'>";  
          echo "<input type='submit'  value='Eliminar' >"; 
        }
        else{
          echo "<input type='hidden' name='descripT' value='". $registro['Nombre']."'>";  
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