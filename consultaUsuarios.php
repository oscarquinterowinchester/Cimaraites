<?php require_once "vistas/vista_superior.php" ?>
<?php 
$where = "";
$nombre = "";
$id_usuario = "";

if(isset($_POST['buscar'])){
    $nombre = $_POST['xname'];
    $id_usuario = $_POST['id_usuario'];

    $where = "WHERE 1=1 ";

    if(!empty($nombre)){
        $where .= "AND u.nombre LIKE '%$nombre%' ";
    }

    if(!empty($id_usuario)){
        $where .= "AND u.id_usuario = $id_usuario ";
    }
}
?>
<style>
.formularioconsultas{
    gap: 10px;
    padding-left: 10px;
}

</style>
        
       <form  class="formularioconsultas" method="POST">
        <input placeholder="Nombre" type="text" name="xname">
        <input placeholder="ID Usuario" type="text" name="id_usuario">
        <button name="buscar" type="submit" class="btn btn-primary">BUSCAR</button>
        </form>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Solicitudes</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Estatus</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        <?php 
        include('ProyectoPrueba/conexion.php');
       
            $query = "SELECT id_usuario,nombre, ap_paterno,ap_materno,correo,telefono,nombre_estado 
            FROM usuarios AS u
            INNER JOIN estado_usuario AS et ON et.id_estado = u.estado_usuario
            INNER JOIN tipo_usuario AS tu ON tu.id_tipo_usuario = u.tipo_usuario
            $where
            AND u.estado_usuario != 7 
            limit 5";
            
            $datos = $con->query($query);
            while($row=mysqli_fetch_array($datos)){
        ?>
        <tr>
        <th> <?php echo $row["id_usuario"]?> </th>
        <th> <?php echo $row["nombre"]?> </th>
        <th> <?php echo $row["ap_paterno"]." ". $row["ap_materno"]?> </th>
        <th> <?php echo $row["correo"]?> </th>
        <th> <?php echo $row["telefono"]?> </th>
        <th> <?php echo $row["nombre_estado"]?> </th>
        <th><a href="cambiarestado.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-info"> Visualizar </a></th>

        </tr>
        
        <?php } ?> 



        </tbody>
        </table>
        </div>
        </div>
        </div>

        </div>
        <!-- /.container-fluid -->

        </div>
            </div>
        <!-- End of Main Content -->

        <?php require_once "vistas/vista_inferior.php" ?>
