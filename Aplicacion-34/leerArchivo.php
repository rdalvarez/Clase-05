<?php 
/**
* 
*/
class ArchivosTXT
{
	public static function leerArchivo()
	{
		$texto = array();

		$archivo =fopen("misArchivos/palabras.txt", "r");

		while (!feof($archivo))
		{
			$renglon=fgets($archivo);
			$palabras=explode(" ", $renglon);
			$texto[]=$palabras;
		}

		ArchivosTXT::ContarLetras($texto);
	}

	private static function ContarLetras($texto)
	{
		$contDePalabras = 0;
		$contUnaLetra = 0;
		$contDosLetra = 0;
		$contTresLetra = 0;
		$contMasLetra = 0;
		$exepciones = array(".");

		foreach ($texto as $renglon) //separo el texto en renglones
		{
			
			foreach ($renglon as $palabra) //separo el renglon en palabras
			{	
				$palabra = trim($palabra);
				$aux = str_replace($exepciones, "", $palabra);

				var_dump($aux); echo "<br>";

				switch (strlen($aux)) {
					case 1:
						$contUnaLetra++;
						break;
					
					case 2:
						$contDosLetra++;
						break;
					
					case 3:
						$contTresLetra++;
						break;
					
					default:
						$contMasLetra++;
						break;
				}				
			}

			//$contDePalabras = $contDePalabras + count($renglon); //Inf cuenta la cantidad de palabras
		}

		
		//echo "Se encontraron " . $contDePalabras . " palabras." . "<br>";
		echo "1 letra: " . $contUnaLetra . "<br>";
		echo "2 letras: " . $contDosLetra . "<br>";
		echo "3 letras: " . $contTresLetra . "<br>";
		echo "+ de 4: " . $contMasLetra . "<br>";

	}
}

 ?>