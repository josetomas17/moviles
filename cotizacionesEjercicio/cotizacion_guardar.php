<?php
$mysqli = new mysqli("localhost", "talleradmin", "somepassword", "tallerbd");
$mysqli2 = new mysqli("localhost", "talleradmin", "somepassword", "tallerbd");
session_start();
$mensaje = "Sin mensajes";
if (!isset($_SESSION['nombre_cliente']) && !isset($_SESSION['descripcion_coche']) && !isset($_SESSION['fecha_actual'])) {
header('Locaton: cotzacion_inicia.php');
//echo 'No se ha iniciado sesion';
} else {
include 'inc/conexion.php';
//$db_table_name = "marca";
if (!$mysqli->query("CALL guardar_co('" . $_SESSION['nombre_cliente'] . "','" . $_SESSION['descripcion_coche'] . "','" .
$_SESSION['fecha_actual'] . "')")) {
echo "Falló la llamada procedimiento principal: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
$mensaje = "La cotzacion se guardó correctamente";
session_destroy();
if (!$mysqli2->query("CALL eliminar_temporal()")) {
echo "Falló la llamada eliminar temporal: (" . $mysqli2->errno . ") " . $mysqli2->error;
} else {
}
}
}
?>