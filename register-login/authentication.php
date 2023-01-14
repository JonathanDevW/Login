<?php
	//Iniciar la Sesión
	session_start();
	//Comprobar que el usuario esta autenticado

	if (!isset($_SESSION["authenticated"])){
		//Si el usuario no esta autenticado, redirigirlo a la página de incio de sesión
		header("Location : login-page.php");
		//Salir del script
		exit();
	}
