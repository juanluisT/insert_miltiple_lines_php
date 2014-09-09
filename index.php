<?php
	require 'app/controller/mvc.controller.php';

     //se instancia al controlador 
	$mvc = new mvc_controller();

	
	if( $_GET['action'] == 'busqueda' ) //muestra el modulo del busqueda
	{	
			$mvc->busquedas();	
	}
	else if( isset($_POST['date']) || isset($_POST['orden']) || isset($_POST['vendor']))//muestra el buscador y los resultados
	{      
			$mvc->busqueda( $_POST['date'], $_POST['orden'], $_POST['vendor'] );
	}

	else if( $_GET['action'] == 'Vendors' ) //muestra el modulo del busqueda
	{	
			$mvc->vendors();	
	}
	else if(isset($_POST['vendor']))//muestra 
	{
			$mvc->vend( $_POST['vendor'] );
	}
	else if(isset($_POST['Add']))//muestra 
	{
			 //$url=  $_GET['url'];
			// echo <iframe src="add.php" ></iframe>
	}
	else //Si no existe GET o POST -> muestra la pagina principal
	{	
		$mvc->principal();
	}

	

?>