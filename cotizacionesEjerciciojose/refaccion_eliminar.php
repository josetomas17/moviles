<?php
include 'inc/conexion.php';
$id_sucursal_eliminar = $_GET['id_sucursal'];

$ins = $con->prepare("DELETE from refaccion where refaccion_id=?");
$ins->bind_param("i",$id_sucursal_eliminar);
if ($ins->execute()) {
	
    header("Location: alerta.php?tipo=exito&operacion=refaccion Eliminada&destino=ver_refaccion.php");
} else {
    header("Location: alerta.php?tipo=fracaso&operacion=Refaccion No Eliminada&destino=ver_refaccion.php");
}
$ins->close();
$con->close();