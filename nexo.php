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

		switch ($extencion) 
		{
			case "doc":
			case "docx":
				if ($tamaño>61440) 
				{
					echo "Archivo demaciado grande (" . $extencion . " * " . $tamaño . ">" . "61440)". "<br>";
					$Bandera = true;
				}
				break;

			case "jpg":
			case "jpeg":
			case "gif":
				if ($tamaño>361200) 
				{
					echo "Archivo demaciado grande (." . $extencion . " * " . $tamaño . " > " . "361200)". "<br>";
					$Bandera = true;
				}
				break;

			default:
				if ($tamaño>512000) 
				{
					echo "Archivo demaciado grande (" . $extencion . " * " . $tamaño . " > " . "512000)". "<br>";
					$Bandera = true;
				}				
				break;
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
			echo "Error Inesperado";
		}	
	}
} 
 ?>