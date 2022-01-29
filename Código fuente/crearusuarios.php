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

   echo"<div style='clear: both;'></div><div class='principal'><h1> Usuarios </h1>";


   echo "<center><form action='insertausuario.php' method='post'>
   <p> <label form='login'>LOGIN:</label>
   <input name='Login' type='text'> 
    <label form='password'>PASSWORD:</label>
    <input name='Password' type='password'> </p>";

    echo"<label form='nombre'>NOMBRE:</label>
    <input name='Nombre' type='text'> 
    <label form='ape'>APELLIDOS:</label>
    <input name='Apellidos' type='text'> 
    <label form='email'>EMAIL:</label>
    <input name='Email' type='text'> 
    <label form='tip'>Tipo Usuario:</label>
    <select name='tipo'>
       <option selected value='0'>Normal</option>
       <option value='1'>Admin</option>
    </select>
    <br><br>
    <input type='submit' value='INSERTAR'>
    </form>
  </center>";


  echo"<br></br>
  <table border='1px' align='center'>
   <tr>
    <th>LOGIN</th>
    <th>NOMBRE</th>
    <th>APELLIDOS</th>
    <th>EMAIL</th>
    <th>ACCIÓN</th>
   </tr>";



}
else{
   echo "<div class='header'> <a class='logo'> <img src='logo.png'> Software tool for descriptive analysis of sensor data flow through fuzzy protoforms </a></div>";
   echo "<div class='usu'><div><span style='float:right'>User=" . $_SESSION['login'] . "<a href='cierra.php'><img src='close.png'></a></span>";
   echo "<p><input type='button' onclick=\"location.href='principal.php';\" value='Back to main menu' style='width:210px; height:38px; background-color:#9eaca6; font-size:14pt;'/></p></div>";


  echo"<div style='clear: both;'></div><div class='principal'><h1> Users </h1>";

  echo "<center><form action='insertausuario.php' method='post'>
  <p> <label form='login'>LOGIN:</label>
  <input name='Login' type='text'> 
   <label form='password'>PASSWORD:</label>
   <input name='Password' type='password'> </p>";

   echo"<label form='nombre'>NAME:</label>
   <input name='Nombre' type='text'> 
   <label form='ape'>SURNAME:</label>
   <input name='Apellidos' type='text'> 
   <label form='email'>EMAIL:</label>
   <input name='Email' type='text'> 
   <label form='tip'>USER TYPE:</label>
   <select name='tipo'>
      <option selected value='0'>Normal</option>
      <option value='1'>Admin</option>
   </select>
   <br><br>
   <input type='submit' value='INSERT'>
   </form>
 </center>";


 echo"<br></br>
 <table border='1px' align='center'>
  <tr>
   <th>LOGIN</th>
   <th>NAME</th>
   <th>SURNAME</th>
   <th>EMAIL</th>
   <th>ACTION</th>
  </tr>";



}

?>

   

  <?php
 
 
  $conexion = mysqli_connect($_SESSION['dbhost'], $_SESSION['dbusuario'], $_SESSION['dbpassword']) or die("No conecta la mikkerda esta");

  mysqli_select_db($conexion,$_SESSION['db']);

  $sql="SELECT * FROM Usuarios WHERE Borrado=0;";
  $resultados = mysqli_query($conexion,$sql);
  ?>

 <?php  while ($registro=mysqli_fetch_array($resultados)) {?>
 <tr>
  <td><?php echo $registro['Login'];?></td>
  <td><?php echo $registro['Nombre']; ?></td>
  <td><?php echo $registro['Apellidos']; ?></td>
  <td><?php echo $registro['Email']; ?></td>
  <td>
  <form action="crearusuariosM.php" method="post">
    
    <?php 
    if ($registro['Login']!='admin'){
        
      if( $_SESSION['lenguaje']=="ES"){
        echo "<input value=".$registro['Login']." type='hidden' name=".$registro['Login']. ">";
        echo "<input type='submit'  value='Modificar' >";
       }
       else{
        echo "<input value=".$registro['Login']." type='hidden' name=".$registro['Login']. ">";
        echo "<input type='submit'  value='Modify' >";
       }

    }
    ?>  
  </form>
  <form action="eliminarusuario.php" method="post">
    <?php 
        if ($registro['Login']!='admin'){

          if( $_SESSION['lenguaje']=="ES"){

             echo "<input value=".$registro['Login']." type='hidden' name=".$registro['Login']. ">";
             echo "<input type='submit'  value='Eliminar' >";
          }
          else{
            echo "<input value=".$registro['Login']." type='hidden' name=".$registro['Login']. ">";
            echo "<input type='submit'  value='Delete' >";

          }


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