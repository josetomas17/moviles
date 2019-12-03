
<?php
include 'inc/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_refaccion_post = strtoupper($_POST['id_refaccion']);
    $id_proveedor_post = strtoupper($_POST['id_proveedor']);
    $fecha_solicitud_post = strtoupper($_POST['fecha_solicitud']);
    $precio_post = strtoupper($_POST['precio']);

    $id_sucursal='';
    $ins=$con->prepare("INSERT INTO refaccion_proveedor VALUES(?,?,?,?,?)");
    $ins->bind_param("issss",$id,$id_refaccion_post,$id_proveedor_post,$fecha_solicitud_post,$precio_post);
    if($ins->execute()){
    	
        header("Location: alerta.php?tipo=exito&operacion=Precio Guardado&destino=refaccion_proveedor.php");
    }
    else{
    	
        header("Location: alerta.php?tipo=fracaso&operacion=Precio No Guardado&destino=refaccion_proveedor.php");
    }
    $ins->close();
    $con->close();
}