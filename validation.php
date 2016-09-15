<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
	// TODO

	$username = $_POST['username'];
	$email  = $_POST['email'];
	$password = $_POST['password'];
	
	if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		$_SESSION['message'] = 'Format d\'email incorrect';
		header('Location: register.php');
	}
	if(!isEmailAvailable($db,$email)){
		$_SESSION['message'] = 'Cette email existe déjà';
		header('Location: register.php');
	}
	if(!isUsernameAvailable($db,$username)){
		$_SESSION['message'] = 'Ce nom d\'utilisateur éxiste déjà';
		header('Location: register.php');
	}
	
	userRegistration($db,$username,$email,$password);
	if(userConnection($db,$email,$password))
		header('Location: dashboard.php');
	else
		header('Location: login.php');

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}

