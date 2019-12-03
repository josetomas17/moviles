
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
        <?php include'inc/incluye_menu.php' ?>
        <?php include'inc/conexion.php' ?>
        <!--termina código que incluye el menú responsivo-->
        <div class="container">
            <div class="jumbotron">
                <h1>Registrar refaccion proveedor</h1>
                <form role="form" id="login-form" 
                      method="post" class="form-signin" 
                      action="refaccion_proveedor_guardar.php">
                    
                    <div class="h2">
                        DATOS DEL PROVEEDOR
                    </div>

                    <div class="form-group">

                        <!-- php para proveedor -->

                <?php

                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $databaseName = "tallerbd";

                    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

                
                $query = "SELECT * FROM `proveedor`";
                $result2 = mysqli_query($connect, $query);

                $options = "";

                while($row2 = mysqli_fetch_array($result2))
                {
                    $options = $options."<option> $row2[0] $row2[1] </option>";
                }
                ?>

                <!-- fin php proveedor -->

                <!-- php refaccion -->
                <?php

                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $databaseName = "tallerbd";

                    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

                
                $query = "SELECT * FROM `refaccion`";
                $result2 = mysqli_query($connect, $query);

                $options2 = "";

                while($row2 = mysqli_fetch_array($result2))
                {
                    $options2 = $options2."<option> $row2[0] $row2[2] </option>";
                }
                ?>

                <!-- fin php refaccion -->





                        <label>Seleccione Refaccion</label><br>
                        <select name="id_refaccion">
                            <?php echo $options2;?>
                        </select>

                        <br>
                        <br>

                        <label>Seleccione proveedor</label><br>
                        <select name="id_proveedor">
                        	<?php echo $options;?>
                        </select>

                        
                    </div>

                    <div class="form-group">
                        <label for="nombre_del_proveedor">Fecha de solicitud de precio</label>
                        <input type="date" class="form-control" id="fecha_solicitud" name="fecha_solicitud"
                               step="1" value="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Precio $</label>
                        <input type="number" class="form-control" id="precio" name="precio"
                               placeholder="Precio actual" style="text-transform:uppercase;" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </form>
            </div>
        </div>

    </body>
</html>