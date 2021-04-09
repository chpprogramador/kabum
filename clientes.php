<?php
    include "connect.php";
    $sql = 'SELECT * FROM clientes order by id desc';
                
    $res = mysqli_query($con, $sql);
 ?>

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Clientes</h2>
    </div>
</header>



<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active">Clientes</li>
    </ul>
</div>




    <section class="tables">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Lista de Clientes</h3>
                </div>
                <div class="card-body">
                    <a href="cliente" class="btn btn-primary btn-sm">Cadastrar novo cliente</a>
                </div>
                <div class="card-body">
                                
                    <div>
	                   <table class="table table-striped" cellspacing="0" rules="all" id="ctl09_GridClientes" style="border-width:0px;border-collapse:collapse;">
                    		<tr>
                    			<th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                    		</tr>

                            <?php while ($row = mysqli_fetch_assoc($res)) { ?>      
    

                            <tr>
                    			<td style="width:50%;"><?= $row['nome']; ?></td>
                                <td style="width:25%;" class="cpf-mask"><?= $row['cpf']; ?></td>
                                <td style="width:25%;" class="cel-mask"><?= $row['telefone']; ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/cliente?id=<?= $row['id'] ?>">Editar</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="/excluir-cliente?id=<?= $row['id'] ?>" onclick="return confirm('Deseja realmente excluir esse registro?');">Deletar</a>
                                </td>
                    		</tr>
                            <?php } ?>

                    	</table>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php mysqli_close($con); ?>