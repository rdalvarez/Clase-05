<?php 

if (isset($_POST["subir"])) {

var_dump($_FILES);
echo "<br><br>";
//var_dump($_FILES["archivo"]["name"]);
echo "<br>";

$nombreDelArchivo = explode(".", $_FILES["archivo"]["name"]);//nombre + extencion

$extencion = end($nombreDelArchivo);//solo la extencion

$destino = "Subir/". $nombreDelArchivo[0] . "." . $extencion; //arcmo destino


if (move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino)) {
	echo "OK";
} else {echo "Error Inesperado";}

} else{echo "No se reicibio ninguna informacion.";}


 ?>