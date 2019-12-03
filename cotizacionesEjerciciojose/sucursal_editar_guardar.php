<?php
include 'inc/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_del_proveedor_post = $_POST['id_proveedor'];
    $nombre_del_proveedor_post = strtoupper($_POST['nombre_del_proveedor']);
    $direccion_del_proveedor_post = strtoupper($_POST['direccion_del_proveedor']);
    $telefono_1_post = strtoupper($_POST['telefono_1']);
    $telefono_2_post = strtoupper($_POST['telefono_2']);
    $correo_proveedor_post = strtoupper($_POST['correo_proveedor']);
    
    $ins=$con->prepare("UPDATE sucursal_prov SET sucursal_nombre=?,sucursal_direccion=?,sucursal_telefono=?,sucursal_telefono_2=?,sucursal_correo=? WHERE sucursal_id=?");
    $ins->bind_param("sssssi",$nombre_del_proveedor_post,$direccion_del_proveedor_post,$telefono_1_post,$telefono_2_post,$correo_proveedor_post,$id_del_proveedor_post);
    if($ins->execute()){
        header("Location: alerta.php?tipo=exito&operacion=Sucursal editada&destino=ver_sucursal.php");
    }
    else{
        header("Location: alerta.php?tipo=fracaso&operacion=Sucursal No editado (Sucursal repetida?)&destino=ver_sucursal.php");
    }
    $ins->close();
    $con->close();

}