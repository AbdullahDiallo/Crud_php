<?php

$host = 'localhost';
$db = 'universite';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
   // die('Erreur de connexion');

}else{
   // echo"Success";
}

