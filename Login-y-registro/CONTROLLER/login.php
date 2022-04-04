<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){

	$Email = $_POST['Email'];
	$Password = $_POST['Password'];

	require_once("../MODEL/conexiones.php");
	$obj = new Connection();
	$obj = $obj->login($Email,$Password);

	echo json_encode(["estado"=>$obj]);
} 