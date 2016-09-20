<?php 

	var_dump($_FILES);
	echo "<br>********************************************<br>";
	//var_dump($_FILES["archivo"]["name"]);

if (!isset($_POST['subir'])) 
{
echo "FALTAL ERROR:";
}
else
{
	if (!isset($_FILES['archivo'])) 
	{
		echo "No se cargo ninguna imagen.";
	}
	else
	{

		$nombreDelArchivo = explode(".", $_FILES['archivo']['name']);//nombre + extencion
		$extencion = end($nombreDelArchivo);//solo la extencion
		$destino = "Uploads/". $nombreDelArchivo[0] . "." . $extencion; //armo destino
		$tamaño = $_FILES['archivo']['size'];
		$Bandera = false;

		$extencionImagen = array("jpg", "jpeg", "gif");
		$extencionDocumento = array("doc", "docx");

		if ($tamaño>512000) 
		{
			echo "Archivo demaciado grande (." . $extencion . " * " . $tamaño . " > " . "512000)". "<br>";
			$Bandera = true;
		}
		else
			{
				if ($tamaño>61440 && !in_array($extencion, $extencionImagen)) 
				{
					echo "Imagen demaciado grande (" . $extencion . " * " . $tamaño . ">" . "61440)". "<br>";
					$Bandera = true;
				}

				if ($tamaño>361200 && !in_array($extencion, $extencionDocumento)) 
				{
					echo "Documento demaciado grande (." . $extencion . " * " . $tamaño . " > " . "361200)". "<br>";
					$Bandera = true;
				}
			}

		if (!$Bandera)
		{
			if (move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino))
			{
				echo "Subida de archivo Exitoso.";
			}
		} 
		else
		{
			echo "Subida de archivo Fallido";
		}	
	}
} 
 ?>