<?php  require_once "vistas/vista_superior.php"?>


<div>
  <canvas id="myChart" style="height:50vh; width:50vw;"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php 
include('ProyectoPrueba/conexion.php');
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

 
<?php  require_once "vistas/vista_inferior.php"?>
                               