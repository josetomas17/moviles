


<?php
session_start();
$nombre_cliente;
if (!isset($_SESSION['nombre_cliente']) && !isset($_SESSION['descripcion_coche']) && !isset($_SESSION['fecha_actual'])) {
header('Locaton: cotzacion_inicia.php');
//echo 'No se ha iniciado sesion';
} else {
include'inc/incluye_bootstrap.php';
include 'inc/conexion.php';
include 'inc/incluye_datatable_head.php';
$sel = $con->prepare("SELECT refaccion.refaccion_nombre, proveedor.proveedor_nombre, refaccion_proveedor.precio,
cotzacion_detalle_temporal.cotzacion_detalle_incremento_temporal,
cotzacion_detalle_temporal.cotzacion_detalle_numero_piezas_temporal, cotzacion_detalle_temporal.cotzacion_detalle_mano_obra,
(((precio)+(cotzacion_detalle_incremento_temporal))*(cotzacion_detalle_numero_piezas_temporal))+(cotzacion_detalle_mano_obra)
AS costo_parcial
FROM (refaccion INNER JOIN (proveedor INNER JOIN refaccion_proveedor ON proveedor.proveedor_id =
refaccion_proveedor.id_proveedor) ON refaccion.refaccion_id = refaccion_proveedor.id_refaccion) INNER JOIN
cotzacion_detalle_temporal ON refaccion_proveedor.refaccion_proveedor_id =
cotzacion_detalle_temporal.refaccion_proveedor_id_temporal;
");
$sel->execute();
$res = $sel->get_result();
$row = mysqli_num_rows($res);
}
$total = 0;
?>

<div class="jumbotron">
<div class="h3">
La cotzaci&oacute;n en curso contene la siguiente informaci&oacute;n:<br>
<label>Nombre del cliente: <?php echo $_SESSION['nombre_cliente'] ?></label><br>
<label>Descripci&oacute;n del coche: <?php echo $_SESSION['descripcion_coche'] ?></label>
</div>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
<th> Refaccion </th>
<th>Proveedor</th>
<th>Precio</th>
<th>Incremento</th>
<th>No. de piezas</th>
<th>Costo mano de obra</th>
<th>Costo parcial</th>
</tr>
</thead>
<tbody>
<?php while ($f = $res->fetch_assoc()) { ?>
<tr>
<td><?php echo $f['refaccion_nombre'] ?></td>
<td><?php echo $f['proveedor_nombre'] ?></td>
<td><?php echo $f['precio'] ?></td>
<td><?php echo $f['cotzacion_detalle_incremento_temporal'] ?></td>
<td><?php echo $f['cotzacion_detalle_numero_piezas_temporal'] ?></td>
<td><?php echo $f['cotzacion_detalle_mano_obra'] ?></td>
<td><?php echo $f['costo_parcial'] ?></td>
</tr>
<?php
$total = $total + $row['costo_parcial'];
}
$sel->close();
$con->close();
?>
</tbody>
</table>
</div>
<div class="h1">
Total a cobrar = $
<?php
// echo money_format('%=*(#10.2n', $total) . "\n";
echo number_format($total, 2);
?>
</div>
<div class="h2">
<p> <a href="seleccionar_refaccion_marca.php" class="btn btn-primary" role="buton">A&ntlde;adir m&aacute;s refacciones</a></p>
<p> <a href="cotzacion_imprimir.php" target="_blank" class="btn btn-info" role="buton">Imprimir esta cotzaci&oacute;n</a></p>
<p> <a href="cotzacion_guardar.php" class="btn btn-success" role="buton">Guardar esta cotzaci&oacute;n</a></p>
<p> <a href="cotzacion_eliminar.php" class="btn btn-danger" role="buton">Eliminar esta cotzaci&oacute;n</a></p>
</div>
</div>