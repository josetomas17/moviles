cotiacion_seleccionar_refaccion_marca.php

<?php
include 'inc/conexion.php';
session_start();
$nombre_cliente;
if (!isset($_SESSION['nombre_cliente']) && !
isset($_SESSION['descripcion_coche']) && !
isset($_SESSION['fecha_actual'])) {
header('Locaton: cotzacion_inicia.php');
//echo 'No se ha iniciado sesion';
} else {
}
?>

<div class="jumbotron">
<?php
//Consulta sin parámetros
$sel = $con->prepare("SELECT *from marca");
$sel->execute();
$res = $sel->get_result();
$row = mysqli_num_rows($res);
?>
Elementos devueltos por la consulta: <?php echo $row ?>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<th>Id</th>
<th>Marca</th>
<th>Clic para seleccionar</th>
</thead>
<tfoot>
<th>Id</th>
<th>Marca</th>
<th>Clic para seleccionar</th>
</tfoot>
<tbody>
<?php while ($f = $res->fetch_assoc()) { ?>
<tr>
<td><?php echo $f['marca_id'] ?></td>
<td><?php echo $f['marca_nombre'] ?></td>
<td><a href="cotzacion_seleccionar_refaccion.php?marca_id=<?php echo $f['marca_id'] ?>&marca_nombre=<?php
echo $f['marca_nombre'] ?>">Seleccionar <span class="glyphicon glyphicon-hand-lef"></span> </td>
</tr>
<?php
}
$sel->close();
$con->close();
?>
<tbody>
</table>
</div>