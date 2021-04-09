<?php
    include "connect.php";


    $id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;

    $sql = 'SELECT * FROM usuarios where id='.$id;
    $res = mysqli_query($con, $sql);
    
    while ($row = mysqli_fetch_assoc($res)) {
        $nome=$row["nome"];
        $email=$row["email"];
        $senha=$row["senha"];
    }

?>

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Cadastro de Usuários</h2>
    </div>
</header>



<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/usuarios">Usuários</a></li>
        <li class="breadcrumb-item">Cadastro de Úsuários</li>
    </ul>
</div>

<form method="post" action="/grava-usuario.php">

<section class="forms">
            <div class="container-fluid">

                <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $id ?>" />

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Identificação</h3>
                    </div>

                    

                    <div class="card-body"> 
                        <div class="form-group">
                            <label class="form-control-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value='<?php echo $nome; ?>' />
                        </div>                            
                        <div class="form-group">
                            <label class="form-control-label">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" value='<?php echo $email; ?>' />
                        </div>  
                        <div class="form-group">
                            <label class="form-control-label">Senha</label>
                            <input type="text" name="senha" id="senha" class="form-control" value='<?php echo $senha; ?>' />
                        </div>  
                    </div>

                    <div class="card-body"> 
                        <div class="form-group">
                            <input type="submit" ID="Salvar" Text="Salvar" class="btn btn-primary" />
                        </div>                
                    </div>
                    
                        
                </div>

            </div>
        </section>

</form>
