<?php
	include "connect.php";


	$idusuario = (int)$_POST["idusuario"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];


	if ($idusuario == 0){
		$sql = "INSERT INTO usuarios(nome, email, senha)";
		$sql .= "VALUES ('".$nome."','".$email."','".$senha."')";

	}else{
		$sql = "UPDATE usuarios set nome='".$nome."',email='".$email."',senha='".$senha."' where id=" . $idusuario;
	}

	

    if (mysqli_query($con, $sql)) {
    	header("Location:/usuarios");       
    } else {
    	echo "<script>alert('Ocorreu um erro ao salvar o usuário!')</script>";
    }
    mysqli_close($con);

?>