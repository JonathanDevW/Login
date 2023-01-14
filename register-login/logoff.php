<?php
	session_start();
	$_SESSION = array();
	$logoff = session_destroy();

    if($logoff == true){
        header("Location: login-page.php");
    }
