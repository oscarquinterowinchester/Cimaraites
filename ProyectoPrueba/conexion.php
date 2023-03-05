<?php 
$con = mysqli_connect("cimabd.cfod5yaz2lqn.us-west-2.rds.amazonaws.com",
"admin","V5aFeqGnnwCkBe2wp5zr","cimadb");
// Verificamos si la conexion es correcta
if( mysqli_connect_errno())
{
    echo "Error al conectarse con mysql " . mysqli_connect_error();
}



?>
