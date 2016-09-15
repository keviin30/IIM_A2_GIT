<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');


if( isset($_FILES['music']) && !empty($_FILES['music']) &&
	isset($_POST['title']) && !empty($_POST['title'])){





	// Si le "fichier" reçu est bien un fichier
		$ext = strtolower(substr(strrchr($file['name'], '.')  ,1));
		// Vérification des extentions
		if (1==1) {
			$filename = md5(uniqid(rand(), true));
			$destination = "musics/{$filename}.{$_SESSION['id']}.{$ext}";

			$title = $_POST['title'];
			$file = $_FILES['music'];

			$user_id = $_SESSION['id'];

			$sql = "INSERT INTO musics ( user_id, title, file) VALUES ('$user_id','$title','$file')";
			$req = $db->prepare($sql);
			$req->execute();


			// TODO

		} else {
			$error = 'Erreur, le fichier n\'a pas une extension autorisée !';
		}
	// }

}

include 'view/_header.php';
include 'view/add_music.php';
include 'view/_footer.php';

?>