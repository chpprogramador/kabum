<?php
	include "connect.php";

	$idcliente = (int)$_GET["id"];
	
	$sql = "DELETE from clientes where id=" . $idcliente;
	

    if (mysqli_query($con, $sql)) {
    	$sql = "DELETE from clientes_endereco where id_cliente=" . $idcliente;
    	if (mysqli_query($con, $sql)) {
    		header("Location:/clientes");
    	}
    }