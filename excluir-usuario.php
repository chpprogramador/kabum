<?php
	include "connect.php";

	$id = (int)$_GET["id"];
	
	$sql = "DELETE from usuarios where id=" . $id;
	

    if (mysqli_query($con, $sql)) {
    		header("Location:/usuarios");
    }