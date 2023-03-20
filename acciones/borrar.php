<?php 
include("../conexiones/conexion.php");
$id = $_GET['id_usuario'];
$sql = "DELETE FROM usuarios WHERE id_usuario = '$id'";
if(mysqli_query($con,$sql)){
    Header("Location: ../solicitudes.php");
}
else{
Header("Location: ../error404.html");
}
mysqli_close($con);
?>