<?php
    include "connect.php";
    $sql = 'SELECT * FROM usuarios order by id desc';
                
    $res = mysqli_query($con, $sql);
 ?>

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Usuários</h2>
    </div>
</header>



<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active">Usuários</li>
    </ul>
</div>




    <section class="tables">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Lista de Usuários</h3>
                </div>
                <div class="card-body">
                    <a href="/usuario" class="btn btn-primary btn-sm">Cadastrar novo Usuário</a>
                </div>
                <div class="card-body">
                                
                    <div>
	                   <table class="table table-striped" cellspacing="0" rules="all" id="ctl09_GridClientes" style="border-width:0px;border-collapse:collapse;">
                    		<tr>
                    			<th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                    		</tr>

                            <?php while ($row = mysqli_fetch_assoc($res)) { ?>      
    

                            <tr>
                    			<td style="width:50%;"><?= $row['nome']; ?></td>
                                <td style="width:25%;"><?= $row['email']; ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/usuario?id=<?= $row['id'] ?>">Editar</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="/excluir-usuario?id=<?= $row['id'] ?>" onclick="return confirm('Deseja realmente excluir esse registro?');">Deletar</a>
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