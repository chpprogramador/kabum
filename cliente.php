<?php
    include "connect.php";


    $id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;

    $sql = 'SELECT * FROM clientes where id='.$id;
    $res = mysqli_query($con, $sql);
    
    while ($row = mysqli_fetch_assoc($res)) {
        $nome=$row["nome"];
        $cpf=$row["cpf"];
        $rg=$row["rg"];
        $data_nascimento = new DateTime($row["data_nascimento"]);
        $data = $data_nascimento->format('d/m/Y');
        $telefone=$row["telefone"];
    }

?>

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Cadastro de Cliente</h2>
    </div>
</header>



<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/clientes">Clientes</a></li>
        <li class="breadcrumb-item">Cadastro Cliente</li>
    </ul>
</div>

<form method="post" action="/grava-cliente.php">

<section class="forms">
            <div class="container-fluid">

                <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $id ?>" />

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
                            <label class="form-control-label">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control cpf-mask" value='<?php echo $cpf; ?>' />
                        </div>  
                        <div class="form-group">
                            <label class="form-control-label">RG</label>
                            <input type="text" name="rg" id="rg" class="form-control" value='<?php echo $rg; ?>' />
                        </div>  
                        <div class="form-group">
                            <label class="form-control-label">Data Nascimento</label>
                            <input type="text" name="data_nascimento" id="data_nascimento" class="form-control data-mask" value='<?php echo $data ?>' /> 
                        </div>  
                        <div class="form-group">
                            <label class="form-control-label">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control cel-mask" value='<?php echo $telefone; ?>' /> 
                        </div>  
                    </div>


                    <div id="enderecos">
                        


                        <?php
                            $iditem = 0;
                            $sql = 'SELECT * FROM clientes_endereco where id_cliente='.$id;
                            $res = mysqli_query($con, $sql);
                            
                            while ($row = mysqli_fetch_assoc($res)) {
                                $idendereco=$row["id"];
                                $cep=$row["cep"];
                                $endereco=$row["endereco"];
                                $numero=$row["numero"];
                                $complemento=$row["complemento"];
                                $cidade=$row["cidade"];
                                $estado=$row["estado"];
                            
                                
                        ?>

                        <div id="endereco0">
                            <input type="hidden" name="iditem<?php echo $iditem; ?>" id="iditem" value="<?php echo $idendereco; ?>" />

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Endereço <?php echo ($iditem + 1); ?></h3>
                            </div>

                            <div class="card-body"> 
                                <div class="form-group">
                                    <label class="form-control-label">CEP</label>
                                    <input type="text" name="cep<?php echo $iditem; ?>" id="cep<?php echo $iditem; ?>" class="form-control cep-mask" value="<?php echo $cep; ?>" />
                                </div>      
                                <div class="form-group">
                                    <label class="form-control-label">Endereço</label>
                                    <input type="text" name="endereco<?php echo $iditem; ?>" id="endereco<?php echo $iditem; ?>" class="form-control" value="<?php echo $endereco; ?>" />
                                </div>      
                                <div class="form-group">
                                    <label class="form-control-label">Número</label>
                                    <input type="text" name="numero<?php echo $iditem; ?>" id="numero<?php echo $iditem; ?>" class="form-control" value="<?php echo $numero; ?>" />
                                </div>      
                                <div class="form-group">
                                    <label class="form-control-label">Complemento</label>
                                    <input type="text" name="complemento<?php echo $iditem; ?>" id="complemento<?php echo $iditem; ?>" class="form-control" value="<?php echo $complemento; ?>" />
                                </div>      
                                <div class="form-group">
                                    <label class="form-control-label">Cidade</label>
                                    <input type="text" name="cidade<?php echo $iditem; ?>" id="cidade<?php echo $iditem; ?>" class="form-control" value="<?php echo $cidade; ?>" />
                                </div>   
                                <div class="form-group">
                                    <label class="form-control-label">Estado</label>
                                    <input type="text" name="estado<?php echo $iditem; ?>" maxlength="2" id="estado<?php echo $iditem; ?>" class="form-control" value="<?php echo $estado; ?>" />
                                </div>      
                            </div>
                        </div>

                        <?php 
                        $iditem +=1;
                        } 

                        if ($iditem == 0){ ?>
                            <div id="endereco0">
                            <input type="hidden" name="iditem0" id="iditem" value="0" />

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Endereço 1</h3>
                            </div>

                            <div class="card-body"> 
                                <div class="form-group">
                                    <label class="form-control-label">CEP</label>
                                    <input type="text" name="cep0" id="cep0" class="form-control cep-mask" />
                                </div>      
                                <div class="form-group">
                                    <label class="form-control-label">Endereço</label>
                                    <input type="text" name="endereco0" id="endereco0" class="form-control" />
                                </div>      
                                <div class="form-group">
                                    <label class="form-control-label">Número</label>
                                    <input type="text" name="numero0" id="numero0" class="form-control" />
                                </div>      
                                <div class="form-group">
                                    <label class="form-control-label">Complemento</label>
                                    <input type="text" name="complemento0" id="complemento0" class="form-control" />
                                </div>      
                                <div class="form-group">
                                    <label class="form-control-label">Cidade</label>
                                    <input type="text" name="cidade0" id="cidade0" class="form-control" />
                                </div>   
                                <div class="form-group">
                                    <label class="form-control-label">Estado</label>
                                    <input type="text" name="estado0" id="estado0" maxlength="2" class="form-control" />
                                </div>      
                            </div>
                        </div>
                        <?php }else{ $iditem -=1; } ?>

                        <input type="hidden" name="qtdeItens" id="qtdeItens" value="<?php echo $iditem; ?>" />

                    </div>

                    <div class="card-body"> 
                        <div class="form-group text-right">
                            <input type="button" ID="add_endereco" Value="Adicionar outro Endereço" onclick="addEndereco()" class="btn btn-primary" />
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

<script>
    function addEndereco(){

        var qtde = parseInt(document.getElementById("qtdeItens").value);
        qtde += 1;

        var h = '<input type="hidden" name="iditem'+ qtde +'" id="iditem" value="0" />';

        h += '<div class="card-header d-flex align-items-center">';
        h += '<h3 class="h4">Endereço '+ (qtde + 1) +'</h3>';
        h += '</div>';
        h += '<div class="card-body"> ';
        h += '<div class="form-group">';
        h += '<label class="form-control-label">CEP</label>';
        h += '<input type="text" name="cep'+ qtde +'" id="cep'+ qtde +'" class="form-control" />';
        h += '</div>';
        h += '<div class="form-group">';
        h += '<label class="form-control-label">Endereço</label>';
        h += '<input type="text" name="endereco'+ qtde +'" id="endereco'+ qtde +'" class="form-control" />';
        h += '</div>';
        h += '<div class="form-group">';
        h += '<label class="form-control-label">Número</label>';
        h += '<input type="text" name="numero'+ qtde +'" id="numero'+ qtde +'" class="form-control" />';
        h += '</div>';
        h += '<div class="form-group">';
        h += '<label class="form-control-label">Complemento</label>';
        h += '<input type="text" name="complemento'+ qtde +'" id="complemento'+ qtde +'" class="form-control" />';
        h += '</div>';
        h += '<div class="form-group">';
        h += '<label class="form-control-label">Cidade</label>';
        h += '<input type="text" name="cidade'+ qtde +'" id="cidade'+ qtde +'" class="form-control" />';
        h += '</div>';
        h += '<div class="form-group">';
        h += '<label class="form-control-label">Estado</label>';
        h += '<input type="text" name="estado'+ qtde +'" id="estado'+ qtde +'" class="form-control" maxlength="2" />';
        h += '</div>';
        h += '</div>';

        $("#enderecos").append(h);
        document.getElementById("qtdeItens").value = qtde;
    }
</script>