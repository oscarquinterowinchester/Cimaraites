
<?php require_once "./vistas/vista_superior.php" ?>
<style>
.formularioconsultas{
    gap: 10px;
    padding-left: 10px;
}
.matricula-th{
    display: flex !important;
    flex-direction:row !important;
    flex-wrap: wrap !important;
    width: fit-content !important;
    font-size: 15px !important;
}
</style>
        
       <!-- <form  class="formularioconsultas" method="POST">
        <input placeholder="Nombre" type="text" name="xname">
        <input placeholder="ID Usuario" type="text" name="id_usuario">
        <button name="buscar" type="submit" class="btn btn-primary">BUSCAR</button>
        </form> -->
        <!-- DataTales Example -->
        <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Consultas</h6>
            </div>

        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th class="matricula-th">
            <div>Matricula</div>
            <div>/No.Empleado</div>
        </th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Estatus</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
       <?php 
  $query = "SELECT id_usuario,nombre, ap_paterno,ap_materno,correo,telefono,nombre_estado,tu.id_tipo_usuario 
            FROM usuarios AS u
            INNER JOIN estado_usuario AS et ON et.id_estado = u.estado_usuario
            INNER JOIN tipo_usuario AS tu ON tu.id_tipo_usuario = u.tipo_usuario order by u.estado_usuario";
  $datos = $con->query($query);
  while($row=mysqli_fetch_array($datos)){
?>
  <tr>
    <th> 
      <?php echo $row["id_usuario"]?>
    </th>
    <th> <?php echo $row["nombre"]." ".$row["ap_paterno"]." ". $row["ap_materno"]?> 
    <?php 
        // Check the value of id_tipo_usuario and display the appropriate badge
        if ($row['id_tipo_usuario'] == 8) {
          echo '<span class="badge badge-success">alumno</span>';
        } elseif ($row['id_tipo_usuario'] == 9) {
          echo '<span class="badge badge-primary">docente</span>';
        } elseif ($row['id_tipo_usuario'] == 10) {
          echo '<span class="badge badge-info">admin.</span>';
        } else {
          // Handle other cases here
        }
      ?>
    </th>
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
            </div>
        <!-- End of Main Content -->

        <?php require_once "vistas/vista_inferior.php" ?>
