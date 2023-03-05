<?php
include("conexion.php");

$id = $_POST['ID'];
$apeP = $_POST['Apellido'];
$apeM = $_POST['ApellidoM'];
$edad = $POST['Edad'];

$sql = "INSERT INTO personas VALUES ('0','$apeP','$apeM','$edad')";
$datos = $con->query($sql);

if($datos){
    Header("Location: hola.php");
}
else {
    Header("Location: error404.html");
}



?>