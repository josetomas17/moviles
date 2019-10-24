<div class = "jumbotron">
	<h1> consultoria de marcas</h1>
	<?php
	$sel =$con - > prepare ("SELECT * FROM marca");
	$sel -> execute ();
	$res = $sel -> get_result();
	$row = mysql_num_rows($res);
	?>
	resultados por la consulta: <?php echo $row ?>
	<table id="example" class="table table-Striped table-bordered" cellspacing="0" width="100%" > 
		<select name="">
			
			<?php while ($f = $res -> fetch_array()) { ?>
				<option value="<?php echo $f['marca_nombre']?>"><?php echo $f['marca_nombre']?> </option>
				<?php 
			}
			$sel -> close();
			$con -> close();

?>
			</select>
		</table>

	</div>
</div>
</div>
<?php
include 'inc/incluye_datatable_pie.php';
?>
</body>
</html>