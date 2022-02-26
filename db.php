<?php

session_start();

$conn = mysqli_connect(
'localhost',
'root',
'',
'php_crud'
);

//Comprobando la coneccion a la base de datos
#if(isset($conn)){
#   echo'Base de datos conectado';
#}

?>