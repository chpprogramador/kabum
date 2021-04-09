<?php
	include "connect.php";

	$remove = array("/", "\\", ".", "-", "(", ")", " ");

	$idcliente = (int)$_POST["idcliente"];
	$nome = $_POST["nome"];
	$cpf = str_replace($remove, "", $_POST["cpf"]);
	$rg = $_POST["rg"];
	$data_nascimento = $_POST["data_nascimento"];
	$telefone = str_replace($remove, "", $_POST["telefone"]);

	$qtdeItens = (int)$_POST["qtdeItens"];


	if ($idcliente == 0){
		$sql = "INSERT INTO clientes(nome, cpf, rg, data_nascimento, telefone)";
		$sql .= "VALUES ('".$nome."','".$cpf."','".$rg."','".implode("-",array_reverse(explode("/",$data_nascimento)))."','".$telefone."')";

	}else{
		$sql = "UPDATE clientes set nome='".$nome."',cpf='".$cpf."',rg='".$rg."',data_nascimento='".implode("-",array_reverse(explode("/",$data_nascimento)))."',telefone='".$telefone."' where id=" . $idcliente;
	}

	

    if (mysqli_query($con, $sql)) {

    	if ($idcliente == 0){
    		$sql = 'SELECT id FROM clientes order by id desc limit 1';
		    $res = mysqli_query($con, $sql);
		    while ($row = mysqli_fetch_assoc($res)) {
		    	$idcliente = $row['id'];
		    }	
    	}

    	for ($i = 0; $i <= $qtdeItens; $i++) {

    		$iditem = $_POST["iditem".$i];
		    $cep = str_replace($remove, "", $_POST["cep".$i]);
		    $endereco = $_POST["endereco".$i];
		    $numero = $_POST["numero".$i];
		    $complemento = $_POST["complemento".$i];
		    $cidade = $_POST["cidade".$i];
		    $estado = $_POST["estado".$i];

		    if ($iditem == "0"){
				$sql = "INSERT INTO clientes_endereco(id_cliente, cep, endereco, numero, complemento, cidade, estado)";
				$sql .= "VALUES (".$idcliente.",'".$cep."','".$endereco."','".$numero."','".$complemento."','".$cidade."','".$estado."')";
			}else{
				$sql = "UPDATE clientes_endereco set id_cliente=".$idcliente.",cep='".$cep."',endereco='".$endereco."',numero='".$numero."',complemento='".$complemento."',cidade='".$cidade."',estado='".$estado."' where id=" . $iditem;
			}

			

			if (mysqli_query($con, $sql)) {
				header("Location:/clientes");
			}else{
				echo "<script>alert('Ocorreu um erro ao salvar o endereço!')</script>";
			}

		}


       
    } else {
    	echo "<script>alert('Ocorreu um erro ao salvar o cliente!')</script>";
    }
    mysqli_close($con);

?>