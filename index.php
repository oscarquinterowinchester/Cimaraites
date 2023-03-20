

<?php  require_once "vistas/vista_superior.php"?>

<style>
#grafica{
  width:fit-content;
}

</style>


<style>

  .form-control{
    width: 30%;
  }
  #table{
    display: flex;
    flex-direction:column;
    width:100vw;
    justify-content:center;
    /* align-items:center; */
  }
  label{
    padding-left:0px ;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="card-body">
<div class="table-responsive" id="table">
<div id="grafica">
  <canvas id="myChart" style="height:35vh; width:35vw;"></canvas>
</div>
<?php 
$totalAlu = 0;
$totalProf = 0;
$totalAdmin = 0;
$sql = "SELECT * from usuarios WHERE tipo_usuario = 8";
$data = $con->query($sql);
while($row = mysqli_fetch_array($data)){
  $totalAlu += 1;
} 
$sql1 = "SELECT * from usuarios WHERE tipo_usuario = 9";
$data1 = $con->query($sql1);
while($row1 = mysqli_fetch_array($data1)){
  $totalProf += 1;
}
$sql2 = "SELECT * from usuarios WHERE tipo_usuario = 10";
$data2 = $con->query($sql2);
while($row1 = mysqli_fetch_array($data2)){
  $totalAdmin += 1;
}

echo "<script> 
let alumnos = '$totalAlu';
let profesores = '$totalProf';
let Admins = '$totalAdmin';
const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Alumnos','Profesores','Administrativos'],
    datasets: [{
      backgroundColor:['#63d69f','#438c6c','#509c7f'],
      data: [alumnos, profesores, Admins],
    }]
  },
  options: {
    responsive: false,
    maintainAspectRatio: false,
    aspectRatio: 0.5
  }
});



</script>";


?>
<div class="form-group ">
  <label for="alumnos" class="col-sm-2 col-form-label">Alumnos:</label>
  <div class="">
    <input type="text" id="alumnos" class="form-control" name="alumnos" value="<?php echo $totalAlu?>" readonly>
</div>
  <label for="docentes" class="col-sm-2 col-form-label">Docentes:</label>
  <div class="">
    <input type="text" id="docentes" class="form-control" name="docentes" value="<?php echo $totalProf?>" readonly>
</div>
  <label for="administrativos" class="col-sm-2 col-form-label">Administrativos:</label>
  <div class="">
    <input type="text" id="administrativos" class="form-control" name="administrativos" value="<?php echo $totalAdmin?>" readonly>
</div>
<label for="totales" class="col-sm-2 col-form-label">Total:</label>
<div class="">
    <input type="text" id="totales" class="form-control" name="totales" value="<?php echo $totalAdmin+$totalAlu+$totalProf?>" readonly>
</div>
</div>
</div>
</div>
 
<?php  require_once "vistas/vista_inferior.php"?>
                               