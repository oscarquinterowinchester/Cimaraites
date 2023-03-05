<?php
include("conexion.php");


$apeP = $_POST['Apellido'];
$apeM = $_POST['ApellidoM'];
$edad = $_POST['Edad'];

$sql = "INSERT INTO personas VALUES (0,'$apeP','$apeM',$edad)";


if(mysqli_query($con,$sql)){
    Header("Location: hola.php");
}
else {
    
}
mysqli_close($con);


?>