<!DOCTYPE html>
<html>
<head>
	<title>Ap 34</title>

	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<div class="CajaEnunciado">
	<form action="index.php" method="GET" id="FrmIngreso">
		(.../misArchivos/palabras.txt)
		<br>
		<input type="submit" name="Calcular" value="Calcular">
	</form>
</div>
</body>
</html>

<?php 
if (isset($_GET["Calcular"])) {
	require_once "leerArchivo.php";

	ArchivosTXT::leerArchivo();
}
 ?>