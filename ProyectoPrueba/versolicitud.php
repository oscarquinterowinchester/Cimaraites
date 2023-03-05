<?php
include("conexion.php");

$id = $_GET['ID'];

$sql = "SELECT * FROM personas WHERE ID = $id ";

$datos = $con->query($sql);
$row = mysqli_fetch_array($datos);
?>

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

<form action="actualizar.php" method="POST">
    <div class="form-class">
<input type="hidden" id="ID" name="ID" value="<?php echo $row['ID'] ?>">
<label for="Apellido">Apellido </label>
<input type="text" name="Apellido" class="form-control w-25 p-1" id="Apellido" value = "<?php echo $row['Apellido'] ?>">
<label for="ApellidoM">ApellidoM </label>
<input type="text" name="ApellidoM" class="form-control w-25 p-1" id="ApellidoM" value = "<?php echo $row['ApellidoM'] ?>">
<label for="Edad">Edad </label>
<input type="Number" name="Edad" class="form-control w-25 p-1" id="Edad" value = "<?php echo $row['Edad'] ?>">
<input type="submit" class="btn btn-primary">
</div>
 </form>

</body>


</hmtl>