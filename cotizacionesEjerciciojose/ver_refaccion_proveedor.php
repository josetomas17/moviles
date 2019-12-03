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
                $sel = $con->prepare("SELECT *from refaccion_proveedor");


                $sel->execute();
                $res = $sel->get_result();
                $row = mysqli_num_rows($res);
                ?>



                Elementos devueltos por la consulta: <?php echo $row ?>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <th>ID REFACCION PROVEEDOR</th>
                    <th>ID REFACCION</th>
                    <th>ID PROVEEDOR</th>
                    <th>FECHA SOLICITUD</th>
                    <th>PRECIO</th>
                    </thead>
                    <tfoot>
                    <th>ID REFACCION PROVEEDOR</th>
                    <th>ID REFACCION</th>
                    <th>ID PROVEEDOR</th>
                    <th>FECHA SOLICITUD</th>
                    <th>PRECIO</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $f['refaccion_proveedor_id'] ?></td>
                                <td><?php echo $f['id_refaccion'] ?></td>
                                <td><?php echo $f['id_proveedor'] ?></td>
                                <td><?php echo $f['fecha_solicitud'] ?></td>
                                <td><?php echo $f['precio'] ?></td>
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