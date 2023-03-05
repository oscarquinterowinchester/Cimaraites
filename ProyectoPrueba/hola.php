<?php
session_start();
?>


<!DOCTYPE html>
<html> 
<head>
<meta charset = "utf-8"> 
<title>Prueba10 </title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">
<form action="insertar.php" method="POST">
  <div class="form-group">
    <label for="Apellido">Primer Apellido</label>
    <input type="text" class="form-control w-25 p-1" id="Apellido" name ="Apellido" >
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label >Segundo Apellido</label>
    <input type="text" class="form-control w-25 p-1" id="ApellidoM" name ="ApellidoM" >
  </div>
  <div class="form-group">
    <label >edad</label>
    <input type="number" class="form-control w-25 p-1 mb-2" id="Edad" name ="Edad" >
  </div>
  <input type="submit" class="btn btn-primary">
</form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First A</th>
      <th scope="col">Last</th>
      <th scope="col">Age</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php 
     include('conexion.php');
     $query = "SELECT * FROM personas";
     $datos = $con->query($query);
    while($row=mysqli_fetch_array($datos)){
      ?>
      <tr>
        <th> <?php echo $row["ID"]?> </th>
        <th> <?php echo $row["Apellido"]?> </th>
        <th> <?php echo $row["ApellidoM"]?> </th>
        <th> <?php echo $row["Edad"]?> </th>
        <th><a href="versolicitud.php?ID=<?php echo $row['ID'] ?>" class="btn btn-info"> Aceptar </a></th>
        <th><a href="borrar.php?ID=<?php echo $row['ID'] ?>" class="btn btn-danger"> Rechazar </a></th>

    </tr>
    <?php } ?>
  </tbody>
</table>

</div>
</body>



</html>