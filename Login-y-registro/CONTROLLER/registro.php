<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){
	
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];


	require_once("../MODEL/conexiones.php");
	$obj = new Connection();
	$resultado = $obj->registro($Nombre,$Apellido,$Email,$Password);
	echo json_encode(["estado"=>$resultado]);
} 