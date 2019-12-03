<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        include'inc/incluye_bootstrap.php';
        include 'inc/conexion.php';
        include 'inc/incluye_datatable_head.php';
        ?>
    </head>
    <body>
        <!--código que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php' ?>
        <!--termina código que incluye el menú responsivo-->
        <div class="container">
            <div class="jumbotron">
                <?php
                //Consulta sin parámetros
                $sel = $con->prepare("SELECT *from refaccion");


                $sel->execute();
                $res = $sel->get_result();
                $row = mysqli_num_rows($res);
                ?>



                Elementos devueltos por la consulta: <?php echo $row ?>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <th>ID REFACCION</th>
                    <th>ID MARCA</th>
                    <th>REFACCION NOMBRE</th>
                    <th>REFACCION DESCRIPCION</th>
                    <th>IMAGEN</th>
                    <th>VISUALIZAR</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                    </thead>
                    <tfoot>
                    <th>ID REFACCION</th>
                    <th>ID MARCA</th>
                    <th>REFACCION NOMBRE</th>
                    <th>REFACCION DESCRIPCION</th>
                    <th>IMAGEN</th>
                    <th>VISUALIZAR</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $f['refaccion_id'] ?></td>
                                <td><?php echo $f['marca_id'] ?></td>
                                <td><?php echo $f['refaccion_nombre'] ?></td>
                                <td><?php echo $f['refaccion_descripcion'] ?></td>
                                <td><img src="<?php echo $f['refaccion_imagen'] ?>" class="img-thumbnail img-fluid" > </td>

                                <td><a href="sucursal_visualizar.php?id_sucursal=<?php echo $f['sucursal_id'] ?>"><span class="glyphicon glyphicon-edit"> </span> Ver</a></td>

                                <td><a href="sucursal_editar.php?id_sucursal=<?php echo $f['sucursal_id'] ?>"><span class="glyphicon glyphicon-edit"> </span> Editar</a></td>
                                <td><a href="refaccion_eliminar.php?id_sucursal=<?php echo $f['refaccion_id'] ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
                            </tr>

                            <?php   
                        }
                        $sel->close();
                        $con->close();
                        ?>
                    <tbody>
                </table>
            </div>
        </div>
        <?php
        include 'inc/incluye_datatable_pie.php';
        ?>
    </body>
    </html>