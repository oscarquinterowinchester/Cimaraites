
              
              <?php require_once "vistas/vista_superior.php" ?>
               <!-- Begin Page Content -->
                <div class="container-fluid">
                <!-- <form action="solicitudes.php" method="post">
                <div class="form-group">
                    <label for="tipo_usuario">Tipo de Usuario</label>
                    <select class="form-control form-control-sm" id="tipo_usuario" name="tipo_usuario">
                    <option value="alumno">Alumno</option>
                    <option value="docente">Docente</option>
                    <option value="administrativo">Administrativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tipo_viaje">Tipo de Viaje</label>
                    <select class="form-control form-control-sm" id="tipo_viaje" name="tipo_viaje">
                    <option value="conductor">Conductor</option>
                    <option value="pasajero">Pasajero</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
                </form> -->
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
                                    $query = "SELECT u.id_usuario,u.nombre, u.ap_paterno,u.ap_materno,u.correo,u.telefono,et.nombre_estado
                                    from usuarios as u,estado_usuario as et where u.estado_usuario = et.id_estado and
                                   u.estado_usuario = 7";
                                    $datos = $con->query($query);
                                    while($row=mysqli_fetch_array($datos)){
                                    ?>
                                    <tr>
                                        <th> <?php echo $row["nombre"]?> </th>
                                        <th> <?php echo $row["ap_paterno"]." ". $row["ap_materno"]?> </th>
                                        <th> <?php echo $row["correo"]?> </th>
                                        <th> <?php echo $row["telefono"]?> </th>
                                        <th> <?php echo $row["nombre_estado"]?> </th>
                                        <th><a href="visualizar.php?ID=<?php echo $row['id_usuario'] ?>" class="btn btn-info"> Ver Mas </a></th>
                                        
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
            <!-- End of Main Content -->

        <?php require_once "vistas/vista_inferior.php" ?>