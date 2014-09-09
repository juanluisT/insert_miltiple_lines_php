<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
require_once "db.class.php";

class busqueda extends database {

	/* REALIZA UNA CONSULTA A LA BASE DE DATOS EN BUSCA DE  REGISTROS UNIVERSITARIOS DADOS COMO
	     PARAMETROS LA "CARRERA" Y LA "CANTIDAD" DE REGISTROS A MOSTRAR
		 INPUT:
		 $carrera | nombre de la carrera a buscar
		 $limit | cantidad de registros a mostrar
		 OUTPUT:
		 $data | Array con los registros obtenidos, si no existen datos, su valor es una cadena vacia
	 */
	
	function buscando($date=NULL, $orden=NULL, $vendor=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT *,SUM(qty) FROM external_mat WHERE date='$date' OR orden='$orden'   GROUP by id "); // AND orden='$orden' AND vendor='$vendor'
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $busqueda_Array = $this->fetch_assoc($query) ) 
					$data[] = $busqueda_Array;			
		
				return $data;
		}else
		{	
			return '';
		}			
	}
	
}

?>