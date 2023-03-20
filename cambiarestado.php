<?php require_once  "vistas/vista_superior.php" ?>

<?php

$id = $_GET['id_usuario'];

$sql = "SELECT u.id_usuario,u.nombre, u.ap_paterno, u.ap_materno, u.correo,u.telefono, et.nombre_estado, sx.nombre_sexo, 
tu.tipo_usuario, cr.nombre_carrera
FROM usuarios u
JOIN estado_usuario et ON u.estado_usuario = et.id_estado
JOIN sexo sx ON u.sexo = sx.id_sexo
JOIN tipo_usuario tu ON tu.id_tipo_usuario = u.tipo_usuario
JOIN carrera cr ON u.carrera = cr.clave_carrera
WHERE u.id_usuario = $id";

$datos = $con->query($sql);
$row = mysqli_fetch_array($datos);
?>

<style>
.matricula-label{
    display: flex !important;
    flex-direction:row !important;
    flex-wrap: wrap !important;
    margin-right:0px;
    
}
.matricula-label div{
  font-size: 13px !important;
}
.grupo-matricula{
  /* gap:3px !important; */
}
</style>
<html> 
<head>
<meta charset = "utf-8">
<title> Update </title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>
<div class="mx-auto" style="width: 600px;">
<form action="acciones/modificarestado.php" method="POST">

  <div class="form-group row">
  <label for="id_usuario" class="col-sm-2 col-form-label matricula-label">
    <div>Matricula</div>
    <div>/No.Empleado</div>
  </label>
  <div class="col-sm-10">
    <input type="text" id="id_usuario" class="form-control" name="id_usuario" value="<?php echo $row['id_usuario'] ?>" readonly>
</div>
  </div>
  <div class="form-group row">
    <label for="Nombre" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" name="Nombre" class="form-control" id="Nombre" value="<?php echo $row['nombre'] ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="Apellidos" class="col-sm-2 col-form-label">Apellidos</label>
    <div class="col-sm-10">
      <input type="text" name="Apellidos" class="form-control" id="Apellidos" value="<?php echo $row['ap_paterno']." ".$row['ap_materno'] ?>" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="Correo" class="col-sm-2 col-form-label">Correo</label>
    <div class="col-sm-10">
      <input type="text" name="Correo" class="form-control" id="Correo" value="<?php echo $row['correo'] ?>" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="Telefono" class="col-sm-2 col-form-label">Telefono</label>
    <div class="col-sm-10">
      <input type="text" name="Telefono" class="form-control" id="Telefono" value="<?php echo $row['telefono'] ?>" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="Estado" class="col-sm-2 col-form-label">Estado</label>
    <div class="col-sm-10">
            <input type="text" name="Estado" class="form-control" id="Estado" value="<?php echo $row['nombre_estado'] ?>" readonly>
       <br>
    <select name="xestado" id="xestado">
            <option value=""></option>
            <option value="suspendido">suspender</option>
            <option value="inactivo">activar</option>
    </select>
    </div>
  </div>

  
  <div class="form-group row">
    <label for="Sexo" class="col-sm-2 col-form-label">Género</label>
    <div class="col-sm-10">
      <input type="text" name="Sexo" class="form-control" id="Sexo" value="<?php echo $row['nombre_sexo']?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="Tipo_usuario" class="col-sm-2 col-form-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text" name="Tipo-usuario" class="form-control" id="Tipo_usuario" value="<?php echo $row['tipo_usuario']?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="Carrera" class="col-sm-2 col-form-label">Carrera</label>
    <div class="col-sm-10">
      <input type="text" name="Carrera" class="form-control" id="Carrera" value="<?php echo $row['nombre_carrera']?>" readonly>
    </div>
</div>
<button type="submit" class="btn btn-primary mt-2">Modificar</button>
  <a  class="btn btn-danger mt-2" data-toggle="modal" data-target="#confirm-delete"> Eliminar </a>
  <a href="consultaUsuarios.php" class="btn btn-warning mt-2">Regresar</a>
  


</form>
</div>
<!-- MODAL -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">¿Seguro que quieres eliminar a este usuario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="acciones/borrar_usuario.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-danger">Confirmar</a>
      </div>
    </div>
  </div>
</div>
</body>
</hmtl>

<?php  require_once "vistas/vista_inferior.php"?>