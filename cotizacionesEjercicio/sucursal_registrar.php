<!– PARA EJEMPLO DASC — >
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--código que incluye Bootstrap-->
        <?php include'inc/incluye_bootstrap.php' ?>
        <!--termina código que incluye Bootstrap-->
    </head>
    <body>
        <!--código que incluye el menú responsivo-->
        <?php
        include'inc/incluye_menu.php';
        include 'inc/conexion.php';
        ?>
        <!--termina código que incluye el menú responsivo-->
        <div class="container">
            <div class="jumbotron">
                <?php
                $sel = $con->prepare("SELECT proveedor_id, proveedor_nombre from PROVEEDOR");
                $sel->execute();
                $res = $sel->get_result();
                ?>
                <h1>Registrar una Sucursal</h1>
                <form role="form" id="login-form" 
                      method="post" class="form-signin" 
                      action="sucursal_guardar.php">
                    <div class="h2">
                        DATOS DE LA SUCURSAL
                    </div>
                    <div class="form-group">
                        <label for="nombre_proveedor">Selecciona un proveedor (requerido)</label>
                        <br>
                        <select class="selectpicker" name="proveedor_id">
                            <?php while ($f = $res->fetch_assoc()) { ?>
                                <option value="<?php echo $f['proveedor_id'] ?>"><?php echo $f['proveedor_nombre'] ?>
                                </option>
                                <?php
                            }
                            $sel->close();
                            $con->close();
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre_sucursal">Nombre de la Sucursal (requerido)</label>
                        <input type="text" class="form-control" id="nombre_sucursal" name="nombre_sucursal"
                               placeholder="Ingresa nombre de la sucursal" style="text-transform:uppercase;" required>
                    </div>
                    <div class="form-group">
                        <label>Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="direccion_sucursal" name="direccion_sucursal"
                               placeholder="Ingresa direcci&oacute;n (Tienda matriz)" style="text-transform:uppercase;">
                    </div>

                    <div class="form-group">
                        <label>Tel&eacute;fono 1</label>
                        <input type="tel" class="form-control" id="telefono_1" name="telefono_1"
                               placeholder="Ingresa primer tel&eacute;fono" style="text-transform:uppercase;">
                    </div>

                    <label>Tel&eacute;fono 2</label>
                    <input type="tel" class="form-control" id="telefono_2" name="telefono_2"
                           placeholder="Ingresa segundo tel&eacute;fono" style="text-transform:uppercase;">
                    <br>
                    <div class="form-group">
                        <label for="correo_sucursal">Correo electr&oacute;nico</label>

                        <input type="email" class="form-control" id="correo_sucursal" name="correo_sucursal"
                               placeholder="Ingresa correo electr&oacute;nico" style="text-transform:uppercase;">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </form>
            </div>
        </div>
        <div class="jumbotron">
                <?php
                //Consulta sin parámetros
                $sel = $con->prepare("SELECT *from sucursal_provedor");
                $sel->execute();
                $res = $sel->get_result();
                $row = mysqli_num_rows($res);
                ?>
                <h2>Listado de Proveedores</h2>
                Elementos devueltos por la consulta: <?php echo $row ?>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <th>Id</th>
                    <th>Nombre del proveedor</th>
                    <th>Ver detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </thead>
                    <tfoot>
                    <th>Id</th>
                    <th>Nombre del proveedor</th>
                    <th>Ver detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $f['proveedor_id'] ?></td>
                                <td><?php echo $f['proveedor_nombre'] ?></td>
                                <td><a href="proveedor_ver_detalles.php?id_proveedor=<?php echo $f['proveedor_id'] ?>"><span class="glyphicon glyphicon-list-alt"></span> Ver</a></td>
                                <td><a href="proveedor_actualizar.php?id_proveedor=<?php echo $f['proveedor_id'] ?>"><span class="glyphicon glyphicon-edit"> </span> Editar</a></td>
                                <td><a href="proveedor_eliminar.php?id_proveedor=<?php echo $f['proveedor_id'] ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
                            </tr>
                            <?php
                        }
                        $sel->close();
                        $con->close();
                        ?>
                    <tbody>
                </table>
            </div>


    </body>
</html>
