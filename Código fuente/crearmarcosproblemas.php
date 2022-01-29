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

if ($_SESSION['IDP']==""){

  $IDP=$_POST['idpro'];
  $_SESSION['IDP']=$IDP;
}
else{
  $IDP=$_SESSION['IDP'];
}

$conexion22 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion22,$_SESSION['db']);

 $sqla="SELECT * FROM Problemas WHERE Login='".$_SESSION['login']."' and Borrado=0 and ID=".$IDP.";";


 $conexion2 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion2,$_SESSION['db']);

 $conexion4 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion4,$_SESSION['db']);

 
 $conexion3 = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

 mysqli_select_db($conexion3,$_SESSION['db']);

 $sql="SELECT * FROM Protoformas WHERE Login='".$_SESSION['login']."' and Borrado=0;";
 $resultados = mysqli_query($conexion2,$sql);

 $sql="SELECT * FROM ConjuntosDatos WHERE Login='".$_SESSION['login']."' and Borrado=0;";
 $resultados2 = mysqli_query($conexion4,$sql);


 $sql="SELECT * FROM Sensores WHERE Login='".$_SESSION['login']."' and Borrado=0;";
 $resultados3 = mysqli_query($conexion3,$sql);



if( $_SESSION['lenguaje']=="ES"){

   echo "<div class='header'><a class='logo'> <img src='logo.png'> Herramienta software para análisis descriptivo de flujo de datos de sensores através de protoformas difusas </a> </div>";
   echo "<div class='usu'><div><span style='float:right'>Usuario=" . $_SESSION['login'] . "<a href='cierra.php'><img src='cerrar.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Volver al menú principal' style='width:240px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='definirproblema.php';\" value='Definición de problemas y marcos de trabajo a resolver' style='width:510px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'>";


   echo"<h1> Problema Nº: ". $IDP ."</h1>

   <h2> Definición del problema</h2>";

   $probl = mysqli_query($conexion22,$sqla);
   foreach ($probl as $r):
        echo $r['DESCRIPCION']; 
      endforeach;

   echo"   <h1> Marcos de Trabajo del problema </h1>";


   echo"<center>
   <form action='insertarmarcoproblema.php' method='post'>";
  
   echo"  <label form='varia'>PROTOFORMA DIFUSA:</label>
     <select name='nombrePT' id='nombrePT'>";
 
    foreach ($resultados as $r):
       echo  "<option value='".$r['Nombre']."'>".$r['Nombre']."</option>";
    endforeach;
 
   echo"  </select>";
 
   echo"  <label form='varia'>CONJUNTO DE DATOS:</label>
     <select name='cdd' id='cdd'>";
 
    foreach ($resultados2 as $r):
     echo  "<option value='".$r['ID']."'>".$r['Nombre']."</option>";
  endforeach;
 
    echo" </select>";
   
    echo" <label form='varia'>SENSOR:</label>
     <select name='idsensor' id='idsensor'>";
 
     foreach ($resultados3 as $r):
       echo  "<option value='".$r['ID_Sensor']."'>".$r['ID_Sensor']."</option>";
 
      endforeach;
 
      echo"
     </select>
 
     <br><br>
     <input name='idp' type='hidden' value=". $IDP ."> 
     <input type='submit' value='INSERTAR MARCO'>
     </form>
   </center>";
 
 
echo"<table border='1px' align='center'>
 <tr>
  <th>PROTOFORMA</th>
  <th>CONJUNTO DE DATOS</th>
  <th>SENSOR</th>
  <th>ACCIONES</th>
  <th>EJECUTAR</th>
  
 </tr>";
     
}
else{
   echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
   echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/>";
   echo "<input type='button' onclick=\"location.href='definirproblema.php';\" value='Problem definitions and framework' style='width:510px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";

   echo"<div style='clear: both;'></div><div class='principal'>";


   echo"<h1> Problem Nº: ". $IDP ."</h1>

   <h2> Problem Definition</h2>";


   $probl = mysqli_query($conexion22,$sqla);
   foreach ($probl as $r):
        echo $r['DESCRIPCION']; 
      endforeach;

      echo"   <h1> Frameworks of the problem </h1>";
  

      echo"<center>
      <form action='insertarmarcoproblema.php' method='post'>
     
       <label form='varia'>FUZZY PROTOFORMS:</label>
        <select name='nombrePT' id='nombrePT'>";
    
       foreach ($resultados as $r):
          echo  "<option value='".$r['Nombre']."'>".$r['Nombre']."</option>";
     endforeach;
    
      
      echo"  </select>
        <label form='varia'>DATASETS:</label>
        <select name='cdd' id='cdd'>";
    
       foreach ($resultados2 as $r):
          echo  "<option value='".$r['ID']."'>".$r['Nombre']."</option>";
    
       endforeach;
    
       echo" </select>
      
        </select>
        <label form='varia'>SENSORS:</label>
        <select name='idsensor' id='idsensor'>";
    
        foreach ($resultados3 as $r):
          echo  "<option value='".$r['ID_Sensor']."'>".$r['ID_Sensor']."</option>";
    
         endforeach;
    
         echo"
        </select>
    
        <br><br>
        <input name='idp' type='hidden' value=". $IDP ."> 
        <input type='submit' value='INSERT FRAMEWORK'>
        </form>
      </center>";
    
    
   echo"<table border='1px' align='center'>
    <tr>
     <th>PROTOFORM</th>
     <th>DATA SET</th>
     <th>SENSORS</th>
     <th>ACTIONS</th>
     <th>EXECUTION</th>
     
    </tr>";
        
   

}

$conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

mysqli_select_db($conexion,$_SESSION['db']);

$sql="SELECT NombreP,Nombre,ID_SENSOR,ID_CD FROM MarcoDeTrabajo,ConjuntosDatos WHERE ConjuntosDatos.ID=MarcoDeTrabajo.ID_CD and MarcoDeTrabajo.Login='".$_SESSION['login']."' and Borrado=0 and ID_Problema='".$IDP."';";
$resultados = mysqli_query($conexion,$sql);


?>

<br></br>

 <?php  while ($registro=mysqli_fetch_array($resultados)) {?>
 <tr>
  <td><?php echo $registro['NombreP'];?></td>
  <td><?php echo $registro['Nombre'];?></td>
  <td><?php echo $registro['ID_SENSOR'];?></td>
  <td>
  <form action="eliminarmarco.php" method="post">
    <input type="hidden" name="np" value="<?php echo $registro['NombreP'];?> ">
    <input type="hidden" name="idcd" value="<?php echo $registro['ID_CD'];?> ">
    <input type="hidden" name="idsensor" value="<?php echo $registro['ID_SENSOR'];?> ">
    <input name="idp" type="hidden" value="<?php echo $IDP;?>">   
    <?php echo "<input type='submit'  value='Eliminar' >";?>  
  </form>
  </td>
  <td>
  <form action="resolvermarco.php" method="post">
    <input type="hidden" name="np" value="<?php echo $registro['NombreP'];?> ">
    <input type="hidden" name="idcd" value="<?php echo $registro['ID_CD'];?> ">
    <input type="hidden" name="idsensor" value="<?php echo $registro['ID_SENSOR'];?> ">
    <input type="hidden" name="idpro" value="<?php echo $IDP;?> ">
    <?php echo "<input type='submit'  value='Resolver' >";?>  
  </form>
  </td>
 </tr>
 
 <?php
 }  mysqli_close($conexion);
 mysqli_close($conexion2);
 mysqli_close($conexion4);
 mysqli_close($conexion22);
 mysqli_close($conexion3);?>
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