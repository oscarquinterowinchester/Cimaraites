<?php 
include("../conexiones/conexion.php");

$id = $_POST['id_usuario'];
$estado = $_POST['xestado'];

if($estado == "suspendido"){
  $idestado = 8;
}
elseif($estado == "inactivo"){
  $idestado = 6;
}
else{
  echo "No seleccionaste ningún estado";
  Header("Location: ../consultaUsuarios.php");
  exit;
}

$sql = "UPDATE usuarios SET estado_usuario = '$idestado' WHERE id_usuario = $id ";

if (mysqli_query($con,$sql)){
    Header("Location: ../consultaUsuarios.php");
}
else{
    // handle error
}

?>
