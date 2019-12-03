<?php
include 'inc/conexion.php';
$id_sucursal_eliminar = $_GET['id_sucursal'];

$ins = $con->prepare("DELETE from sucursal_prov where sucursal_id=?");
$ins->bind_param("i",$id_sucursal_eliminar);
if ($ins->execute()) {
	
    header("Location: alerta.php?tipo=exito&operacion=Sucursal Eliminada&destino=ver_sucursal.php");
} else {
    header("Location: alerta.php?tipo=fracaso&operacion=Sucursal No Eliminada&destino=ver_sucursal.php");
}
$ins->close();
$con->close();