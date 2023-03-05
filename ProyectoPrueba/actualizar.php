<?php 
include("conexion.php");

$id = $_POST['ID'];
$apeP = $_POST['Apellido'];
$apeM = $_POST['ApellidoM'];
$edad = $_POST['Edad'];

$sql = "UPDATE personas SET Apellido = '$apeP', ApellidoM = '$apeM', Edad = $edad WHERE ID = $id ";

if (mysqli_query($con,$sql)){

    Header("Location: hola.php");
}
else{}



?>