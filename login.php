<?php session_start();

/********************************
DATABASE & FUNCTIONS
 ********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
PROCESS
 ********************************/


if(isset($_POST['email']) && isset($_POST['password'])){
	if(!empty($_POST['email']) && !empty($_POST['password'])){

		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$error = 'Format d\'email incorrect';
		}else{
			// Force user connection to access dashboard
			if(userConnection($db, $email, $password))
				header('Location: dashboard.php');
			else
				$error = 'Identifiants invalides';
		}
	}else{
		$error = 'Champs requis !';
	}
}

/********************************
VIEW
 ********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';

?>