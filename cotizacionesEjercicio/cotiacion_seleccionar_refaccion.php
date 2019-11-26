cotiacion_seleccionar_refaccion.php
<?php
include 'inc/conexion.php';
session_start();
$nombre_cliente;
if (!isset($_SESSION['nombre_cliente']) && !isset($_SESSION['descripcion_coche']) && !isset($_SESSION['fecha_actual'])) {
header('Locaton: cotzacion_inicia.php');
//echo 'No se ha iniciado sesion';
} else {
$id_marca_seleecionada = $_GET['marca_id'];
$nombre_marca_seleecionada = $_GET['marca_nombre'];
}
?>

<div class="jumbotron">
<?php
//Consulta sin parámetros
$sel = $con->prepare("SELECT marca.marca_nombre, refaccion.refaccion_nombre, refaccion.refaccion_descripcion, proveedor.proveedor_nombre, refaccion_proveedor.fecha_solicitud,
refaccion_proveedor.precio, refaccion_proveedor.refaccion_proveedor_id
FROM (marca INNER JOIN refaccion ON marca.marca_id = refaccion.marca_id) INNER JOIN (proveedor INNER JOIN refaccion_proveedor ON proveedor.proveedor_id = refaccion_proveedor.id_proveedor) ON
refaccion.refaccion_id = refaccion_proveedor.id_refaccion
GROUP BY marca.marca_nombre, refaccion.refaccion_nombre, refaccion.refaccion_descripcion, proveedor.proveedor_nombre, refaccion_proveedor.fecha_solicitud, refaccion_proveedor.precio,
refaccion_proveedor.refaccion_proveedor_id
HAVING (((marca.marca_nombre)=\"" . $nombre_marca_seleecionada . "\"))
ORDER BY refaccion.refaccion_nombre, refaccion_proveedor.fecha_solicitud DESC;");
$sel->execute();
$res = $sel->get_result();
$row = mysqli_num_rows($res);
?>
Elementos devueltos por la consulta: <?php echo $row ?>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>Marca </th>
<th>Nombre Refaccion</th>
<th>Descripcion</th>
<th>Proveedor</th>
<th>Fecha de solicitud</th>
<th>Precio</th>
<th>Agregar</th>
</tr>
</thead>
<tfoot>
<tr>
<th> Marca </th>
<th>Nombre Refaccion</th>
<th>Descripcion</th>
<th>Proveedor</th>
<th>Fecha de solicitud</th>
<th>Precio</th>
<th>Agregar</th>
</tr>
</tfoot>
<tbody>
<?php while ($f = $res->fetch_assoc()) { ?>
<tr>
<td><?php echo $f['marca_nombre'] ?></td>
<td><?php echo $f['refaccion_nombre'] ?></td>
<td><?php echo $f['refaccion_descripcion'] ?></td>
<td><?php echo $f['proveedor_nombre'] ?></td>
<td><?php echo $f['fecha_solicitud'] ?></td>
<td><?php echo $f['precio'] ?></td>

<td><a href="cotzacion_seleccionar_refaccion_detalles.php?refaccion_proveedor_id=<?php echo $f['refaccion_proveedor_id'] ?>">Seleccionar </a><span class="glyphicon glyphicon-hand-
lef"></span> </td>

</tr>
<?php
}
$sel->close();
$con->close();
?>
<tbody>
</table>
</div>