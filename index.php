<?php
	//Llamado a la clase de conexión
	require 'PDO/Database1.php';

	//Inicializar la variable de almacenamiento del controlador base
	$controller = 'productoController';
	$controller1 = 'facturaController';

	//Determinar las acciones a tomar
	if (!isset($_REQUEST['controller'])) {
		//print("llego al primer if");
		//die();
		if(isset($_REQUEST['ref'])) {
			//print("llego al elseif");
			//die();
			//Llamado a la clase controlador a usar
			require 'controllers/'.$controller1.'.php';
			//Cuando existe una solicitud desde el navegador
			$controller = ucwords($controller1);
			//Realizar una instancia 
			$controller = new $controller;
			//Redireccion al metodo index
			$controller->validateFac($_REQUEST['ref']);
		}
		//Llamado a la clase controlador a usar
		require 'controllers/'.$controller.'.php';

		//Hacer uso de la clase 
		//Reasignar la variable 
		$controller = ucwords($controller);
		//Realizar una instancia 
		$controller = new $controller;
		//Redireccion al metodo index
		$controller->index();
	} else {
		/*print("llego al else");
		die();*/
		//Cuando existe una solicitud desde el navegador
		$controller = ucwords($_REQUEST['controller']. 'controller');
		//Condicional ternario  Condicion           si es verdad		si es falso
		$method		= isset($_REQUEST['method']) ? $_REQUEST['method'] : 'index';

		require 'controllers/'.$controller.'.php';
		$controller = new $controller;

		//Realizar el llamado o la ejecucion del metodo en el controlador
		call_user_func(array($controller, $method));
	}
?>