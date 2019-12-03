<?php 
$id_sucursal_actualizar = $_GET['id_sucursal'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--código que incluye Bootstrap-->
        <?php include'inc/incluye_bootstrap.php' ?>
        <?php include 'inc/conexion.php'; ?>
        <!--termina código que incluye Bootstrap-->

        <!-- PARA DATATABLE -->
        <link href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <!--código que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php' ?>
        <!--termina código que incluye el menú responsivo-->
        <div class="jumbotron">
                <?php
                //Consulta sin parámetros
                $sel = $con->prepare("SELECT *from sucursal_prov WHERE sucursal_id=?");
                $sel->bind_param('i', $id_sucursal_actualizar);
                $sel->execute();
                $res = $sel->get_result();
                $row = mysqli_num_rows($res);
                while ($f = $res->fetch_assoc()) {
                
                    ?>
                    <h1>Actualizar Sucursal</h1>
                    <form role="form" id="login-form" 
                          method="post" class="form-signin" 
                          action="proveedor_actualizar_guardar.php">
                        <div class="h2">
                            Datos de sucursal
                        </div>
                        <div class="form-group">
                            <label for="id_del_proveedor">Id del Proveedor (requerido)</label>
                            <input type="text" class="form-control" id="id_proveedor" name="id_proveedor"
                                   value="<?php echo $f['proveedor_id'] ?>" style="text-transform:uppercase;" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="nombre_del_proveedor">Nombre de sucursal (requerido)</label>
                            <input type="text" class="form-control" id="nombre_del_proveedor" name="nombre_del_proveedor"
                                   value="<?php echo $f['sucursal_nombre'] ?>" style="text-transform:uppercase;" required>
                        </div>
                        <div class="form-group">
                            <label>Direccion</label>
                            <input type="text" class="form-control" id="direccion_del_proveedor" name="direccion_del_proveedor"
                                   value="<?php echo $f['sucursal_direccion'] ?>" style="text-transform:uppercase;">
                        </div>

                        <div class="form-group">
                            <label>Telefono 1</label>
                            <input type="tel" class="form-control" id="telefono_1" name="telefono_1"
                                   value="<?php echo $f['sucursal_telefono'] ?>" style="text-transform:uppercase;">
                        </div>

                        <label>Telefono 2</label>
                        <input type="tel" class="form-control" id="telefono_2" name="telefono_2"
                               value="<?php echo $f['sucursal_telefono_2'] ?>" style="text-transform:uppercase;">
                        <br>
                        <div class="form-group">
                            <label for="correo_proveedor">Correo Electronico</label>

                            <input type="email" class="form-control" id="correo_proveedor" name="correo_proveedor"
                                   value="<?php echo $f['sucursal_correo'] ?>" style="text-transform:uppercase;">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                        
                        <input type="button" value=" Cancelar " name="Cancelar" class="btn btn-danger" OnClick="location.href='proveedor_listar' ">
                    </form>
                    <?php
                }
                $sel->close();
                $con->close();
                ?>
            </div>
        </div>


    </body>
</html>