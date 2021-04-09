<?php
    include "connect.php";
    $sql = 'SELECT id FROM clientes';                
    $res = mysqli_query($con, $sql);
    $n_clienes=mysqli_num_rows($res);

    $sql = 'SELECT id FROM usuarios';                
    $res = mysqli_query($con, $sql);
    $n_usuarios=mysqli_num_rows($res);

    mysqli_close($con);

 ?>

<section class="dashboard-counts">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title">
                        <span>Clientes<br />Cadastrados</span>
                    </div>
                    <div class="number"><strong><?php echo $n_clienes; ?></strong></div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title">
                        <span>Usuários<br />Cadastrados</span>
                    </div>
                    <div class="number"><strong><?php echo $n_usuarios; ?></strong></div>
                </div>
            </div>
            
        </div>
    </div>
</section>