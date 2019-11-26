Verifcar si no existe una cotzación en curso
<?php
$id_marca_seleccionada = $_GET['marca_id'];
$nombre_marca_seleccionada = $_GET['marca_nombre'];
?>
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
        <!--termina código que incluye el menú responsivo-->
        <div class="container">
            <div class="jumbotron">
<?php
session_start();
$nombre_cliente;
if (isset($_SESSION['nombre_cliente']) && isset($_SESSION['descripcion_coche'])) {
header('Locaton: cotzacion_en_curso.php');
}
?>
Formulario para crear una nueva cotzación
<div class="jumbotron">
<form role="form" id="login-form" method="post" class="form-signin" acton="cotzacion_guardar_inicia.php">
<div class="h2">
Iniciar una nueva cotzaci&oacute;n
</div>
<div class="form-group">
<label>Nombre del cliente (requerido)</label>
<input type="text" class="form-control" id="nombre_del_cliente" name="nombre_del_cliente"
placeholder="Ingresa nombre del cliente" style="text-transform:uppercase;" required>
</div>
<div class="form-group">
<label>Descripcion del coche (requerido)</label>
<input type="text" class="form-control" id="descripcion_coche" name="descripcion_coche"
placeholder="Ingresa descripcion general del coche" style="text-transform:uppercase;" required>
</div>
<div class="form-group">
<label>Fecha Actual (requerido)</label>
<input type="date" class="form-control" id="fecha_actual" name="fecha_actual" step="1" value="<?php echo date("Y-m-d"); ?>" required>
</div>
<br>
<buton type="submit" class="btn btn-primary">Siguiente</buton>
<input type="reset" class="btn btn-default" value="Limpiar">
</form>
</div>