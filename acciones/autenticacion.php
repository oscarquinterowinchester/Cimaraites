<?php
session_start();

include("../conexiones/conexion.php");

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (empty($usuario) || empty($contrasena)) {
        // Si alguno de los campos está vacío, se redirige a la página de inicio de sesión
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    
    $sql = "SELECT * FROM usuariosAdmin where usuario = '$usuario' and contrasena = '$contrasena'";

    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) == 1){
        $_SESSION['usuario'] = $usuario;
            header("Location: ../index.php");
            exit();
    }else{
        
        header("Location: ../login.php");
         exit();
    }

    


} else {
    // Si el usuario intenta acceder a este archivo directamente, se redirige a la página de inicio de sesión
    header("Location: ../login.php");
    exit();
}
?>
