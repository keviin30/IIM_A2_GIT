<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');

$title = $_POST['title'];
$music = $_POST['music'];


$sql="INSERT INTO musics ( title, music)
VALUES ('$title','$music')";


$req = $db->prepare($sql);
$req->execute();

header('Location: dashboard.php');







/**
 * Created by PhpStorm.
 * User: Jessy
 * Date: 14/09/2016
 * Time: 15:04
 */