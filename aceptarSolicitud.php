<?php 
include('ProyectoPrueba/conexion.php');

$id = $_POST['id_usuario'];

$sql = "UPDATE usuarios SET estado_usuario = 6 where id_usuario = $id";

if(mysqli_query($con,$sql)){

    Header("Location: solicitudes.php");
}else{
    echo "Fallos esto"; 
}


?>