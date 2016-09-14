<?php include('config/config.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];





$sql="INSERT INTO users ( username, email, password)
VALUES ('$username','$email','$password')";


$req = $db->prepare($sql);
$req->execute();


header('Location: validation.php');

?>