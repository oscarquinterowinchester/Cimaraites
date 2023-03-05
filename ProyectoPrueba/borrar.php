<?php 
include("conexion.php");

$id = $_GET['ID'];

$sql = "DELETE FROM personas WHERE ID = '$id'";

if(mysqli_query($con,$sql)){

    Header("Location: hola.php");
}
else{
Header("Location: error404.html");

}
mysqli_close($con);


?>