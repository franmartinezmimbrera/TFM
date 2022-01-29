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
   echo "<input type='button' onclick=\"location.href='creavariables.php';\" value='Volver al menú Creación Variables' style='width:380px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'>";

   if ($_SESSION['VL']==""){

    $VL=$_POST['descripT'];
    $_SESSION['VL']=$VL;
 }
 else{
    $VL=$_SESSION['VL'];
 }

    echo "<h1> Términos Lingüisticos Variable Lingüística ". $VL. " </h1>";


    echo "<center>
    <form action='insertartermino.php' method='post'>
      <label form='varia'>NOMBRE TÉRMINO LINGÜÍSTICO:</label>
      <input name='nombretermino' type='text' required> 
      <br><br>
      <label form='varia'>VALOR A:</label>
      <input name='a' type='number' step='any' required> 
      <label form='varia'>VALOR B:</label>
      <input name='b' type='number' step='any' required> 
      <label form='varia'>VALOR C:</label>
      <input name='c' type='number' step='any' required> 
      <label form='varia'>VALOR D:</label>
      <input name='d' type='number' step='any' required> 
      <input name='NombreVL' type='hidden' value='". $VL. "'> 
      <br><br>
      <input type='submit' value='INSERTAR'>
      </form>
    </center>";


  echo" <table border='1px' align='center'>
   <tr>
  <th>NOMBRE TÉRMINO</th>
  <th>VALOR A</th>
  <th>VALOR B</th>
  <th>VALOR C</th>
  <th>VALOR D</th>
  <th>ACCIONES</th>
 </tr>";


}
else{

  echo "<div class='header'><a class='logo'> <img src='logo.png'> Herramienta software para análisis descriptivo de flujo de datos de sensores através de protoformas difusas </a> </div>";
  echo "<div class='usu'><div><span style='float:right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
  echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back principal menu' style='width:240px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
  echo "<input type='button' onclick=\"location.href='creavariables.php';\" value='Back to Variables creation menu' style='width:380px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

  echo"<div style='clear: both;'></div><div class='principal'>";

  if ($_SESSION['VL']==""){

    $VL=$_POST['descripT'];
    $_SESSION['VL']=$VL;
 }
 else{
    $VL=$_SESSION['VL'];
 }

    echo "<h1> Linguistic Term Linguistic Var ". $VL. " </h1>";



    echo "<center>
    <form action='insertartermino.php' method='post'>
      <label form='varia'>LINGUISTIC TERM NAME:</label>
      <input name='nombretermino' type='text' required> 
      <br><br>
      <label form='varia'>A VALUE:</label>
      <input name='a' type='number' step='any' required> 
      <label form='varia'>B VALUE:</label>
      <input name='b' type='number' step='any' required> 
      <label form='varia'>C VALUE:</label>
      <input name='c' type='number' step='any' required> 
      <label form='varia'>D VALUE:</label>
      <input name='d' type='number' step='any' required> 
      <input name='NombreVL' type='hidden' value='". $VL. "'> 
      <br><br>
      <input type='submit' value='INSERT'>
      </form>
    </center>";



  echo" <table border='1px' align='center'>
  <tr>
 <th>TERM NAME</th>
 <th>A VALUE</th>
 <th>B VALUE</th>
 <th>C VALUE </th>
 <th>D VALUE</th>
 <th>ACTIONS</th>
</tr>";

}
?>


  <?php
 
 
  $conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

  mysqli_select_db($conexion,$_SESSION['db']);

  $sql="SELECT * FROM TérminosLingüísticos WHERE Login='".$_SESSION['login']."' and Borrado=0 and NombreVL='".$VL."';";
  $resultados = mysqli_query($conexion,$sql);
  ?>

<br></br>


 <?php  while ($registro=mysqli_fetch_array($resultados)) {?>
 <tr>
  <td><?php echo $registro['NombreT'];?></td>
  <td><?php echo $registro['A'];?></td>
  <td><?php echo $registro['B'];?></td>
  <td><?php echo $registro['C'];?></td>
  <td><?php echo $registro['D'];?></td>
  <td>
  <form action="eliminartermino.php" method="post">
    <?php 
          if( $_SESSION['lenguaje']=="ES"){

            echo "<input type='hidden' name='descrip' value='". $registro['NombreT']. "'>";  
            echo "<input type='submit'  value='Eliminar' >";
          }
          else{
            echo "<input type='hidden' name='descrip' value='". $registro['NombreT']. "'>";  
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