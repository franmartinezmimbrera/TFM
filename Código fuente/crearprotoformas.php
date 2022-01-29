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

<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous">
</script>

<script type="text/javascript">
	$(document).ready(function(){
    $('#nombreVL').val(1);
		recargarLista();
		$('#nombreVL').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"cargaterminos.php",
			data:"vl=" + $('#nombreVL').val(),
			success:function(r){
				$('#nombreTL').html(r);
			}
		});
	}
</script>  
</head>
<body>

<?php

$conexion2 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion2,$_SESSION['db']);

 $conexion3 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion3,$_SESSION['db']);

 $sql="SELECT * FROM VariablesLingüísticas WHERE Login='".$_SESSION['login']."' and Borrado=0;";
 $resultados = mysqli_query($conexion2,$sql);

 $sql="SELECT * FROM VentanasTemporales WHERE Login='".$_SESSION['login']."' and Borrado=0;";
 $resultados2 = mysqli_query($conexion2,$sql);


 $sql="SELECT * FROM CuantificadoresLingüísticos WHERE Login='".$_SESSION['login']."' and Borrado=0;";
 $resultados3 = mysqli_query($conexion3,$sql);
 


if( $_SESSION['lenguaje']=="ES"){

   echo "<div class='header'><a class='logo'> <img src='logo.png'> Herramienta software para análisis descriptivo de flujo de datos de sensores através de protoformas difusas </a> </div>";
   $_SESSION['VL']="";
   echo "<div class='usu'><div><span style='float:right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='cerrar.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:240px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='creaelmarco.php';\" value='Volver al menú Creación de elementos' style='width:460px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'><h1> Protoformas Difusas </h1>";


   echo"<center>
   <form action='insertarprotoforma.php' method='post'>
     <label form='varia'>NOMBRE PROTOFORMA DIFUSA:</label>
     <input name='nombreproto' type='text'> 
     <br><br>
     <label form='varia'>VARIABLE LINGÜÍSTICA:</label>
     <select name='nombreVL' id='nombreVL'>";
 
     foreach ($resultados as $r):
       echo  "<option value='".$r['Nombre']."'>".$r['Nombre']."</option>";
 
     endforeach;
 
     echo"</select>
 
     <label form='varia'>TÉRMINO LINGÜÍSTICO:</label>
     
     <select name='nombreTL' id='nombreTL'>
 
     </select>
     <br><br>
 
     <label form='varia'>VENTANA TEMPORAL:</label>
     <select name='nombreVT' id='nombreVT'>";
 
      foreach ($resultados2 as $r):
              echo  "<option value='".$r['NVentana']."'>".$r['NVentana']."</option>";
      endforeach; 
 
     echo "</select>
     <label form='varia'>CUANTIFICADOR LINGÜÍSTICOS:</label>
     <select name='nombreQL' id='nombreQL'>";
 
    foreach ($resultados2 as $r):
              echo  "<option value='".$r['Nombre']."'>".$r['Nombre']."</option>";
    endforeach;
 
     echo"</select>
 
     <br><br>
     <input type='submit' value='INSERTAR'>
     </form>
   </center>";
 


   echo"<table border='1px' align='center'>
   <tr>
    <th>NOMBRE PROTOFORMA DIFUSA</th>
    <th>VARIABLE LINGÜÍSTICA Y TÉRMINO</th>
    <th>VENTANA TEMPORAL</th>
    <th>CUANTIFICADOR LINGÜÍSTICO</th>
   
    <th>ACCIONES</th>
   </tr>";


}
else{
   echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
   echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   $_SESSION['VL']="";
   echo "<input type='button' onclick=\"location.href='creaelmarco.php';\" value='Creation of elements to be used in the framework' style='width:460px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

  echo"<div style='clear: both;'></div><div class='principal'><h1> Fuzzy Protoforms </h1>";

  echo"<center>
  <form action='insertarprotoforma.php' method='post'>
    <label form='varia'>FUZZY PROTOFORM NAME:</label>
    <input name='nombreproto' type='text'> 
    <br><br>
    <label form='varia'>LINGUISTIC VARIABLE:</label>
    <select name='nombreVL' id='nombreVL'>";

    foreach ($resultados as $r):
      echo  "<option value='".$r['Nombre']."'>".$r['Nombre']."</option>";

    endforeach;

    echo"</select>

    <label form='varia'>LINGUISTIC TERM</label>
    
    <select name='nombreTL' id='nombreTL'>

    </select>
    <br><br>

    <label form='varia'>FUZZY TEMPORAL WINDOW:</label>
    <select name='nombreVT' id='nombreVT'>";

     foreach ($resultados2 as $r):
             echo  "<option value='".$r['NVentana']."'>".$r['NVentana']."</option>";
     endforeach; 

    echo "</select>
    <label form='varia'>LINGUISTIC QUANTIFICATOR:</label>
    <select name='nombreQL' id='nombreQL'>";

   foreach ($resultados2 as $r):
             echo  "<option value='".$r['Nombre']."'>".$r['Nombre']."</option>";
   endforeach;

    echo"</select>

    <br><br>
    <input type='submit' value='INSERT'>
    </form>
  </center>";



echo"<table border='1px' align='center'>
<tr>
 <th>FUZZY PROTOFORM NAME</th>
 <th>LINGUISTIC VARIABLE AND TERM</th>
 <th>FUZZY TEMPORAL WINDOWS </th>
 <th>LINGUISTIC QUANTIFICADOR</th>

 <th>ACTIONS</th>
</tr>";


}

 
  $conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

  mysqli_select_db($conexion,$_SESSION['db']);

  $sql="SELECT * FROM Protoformas WHERE Login='".$_SESSION['login']."' and Borrado=0;";
  $resultados = mysqli_query($conexion,$sql);

 
?>

<br></br>

 <?php  while ($registro=mysqli_fetch_array($resultados)) {?>
 <tr>
  <td><?php echo $registro['Nombre'];?></td>
  <td><?php echo $registro['VLingüistica']."-".$registro['TLinguistico'];?></td>
  <td><?php echo $registro['VTemporal'];?></td>
  <td><?php echo $registro['CQLingüístico'];?></td>
  <td>


  <form action="crearprotoformasM.php" method="post">
  <?php 
     if( $_SESSION['lenguaje']=="ES"){
      echo "<input type='hidden' name='".$registro['Nombre']. "' value='". $registro['Nombre']. "' >";  
       echo "<input type='submit'  value='Modificar' >";  
     }
     else{
      echo "<input type='hidden' name='".$registro['Nombre']. "' value='". $registro['Nombre']. "' >";  
       echo "<input type='submit'  value='Modifify' >";  
     }
  ?>
  </form>
  <form action="eliminarprotoforma.php" method="post">
  <?php 
     if( $_SESSION['lenguaje']=="ES"){
  
       echo"<input type='hidden' name='descrip' value='".  $registro['Nombre']. "'>";  
       echo "<input type='submit'  value='Eliminar' >";  
  
    }
    else{

      echo"<input type='hidden' name='descrip' value='".  $registro['Nombre']. "'>";  
      echo "<input type='submit'  value='Delete' >";
    }
    ?>
    </form>
  </td>
 </tr>
 
 <?php
 }  mysqli_close($conexion);
    mysqli_close($conexion2);
    mysqli_close($conexion2);?>
 </table>


</div>


<div class="footer">
  <a class="logo"><img src="logoasia.png">Grupo de Investigación ASIA - Universidad de Jaén <a href="https://asia.ujaen.es"> https://asia.ujaen.es </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a> 
  <a class="logo2"> Copyright 2021 - Francisco Jesús Martínez Mimbrera </a> 
    
</div>
</body>
</html>