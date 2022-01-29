<?php

session_start();
if( $_SESSION['lenguaje']=="ES"){
    session_destroy();
    header("Location: index.php");
   }
   else{
    session_destroy();
    header("Location: loginI.php");
   }


?>

 



