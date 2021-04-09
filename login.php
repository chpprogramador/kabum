<?php

            include "connect.php";
            
            if (isset($_POST["btnEntrar"])) {
                $usuario=$_POST["txtUsuario"];
                $senha=$_POST["txtSenha"];

                $sql = "SELECT * FROM usuarios WHERE email='". $usuario . "' AND senha='". $senha ."'";
                
                $res = mysqli_query($con, $sql);
                $row = mysqli_num_rows($res);

                if($row == 0) {
                    $msg = "Dados incorretos!";
                } else {

                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    header("Location:index.php");
                }
            }

            mysqli_close($con);
        ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/template/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/template/css/fontastic.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/template/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/template/css/style.default.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/template/css/custom.css">
    <!-- Favicon-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <!-- <link rel="stylesheet" href="/Sistema/Admin/Conteudo/Plugins/sweetalert/dist/sweetalert.css"/> -->
</head>
<body>
    <form id="form1" method="post" action="login.php">
        <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Login</h1>
                  </div>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                    <div class="form-group">

                        <input type="text" ID="txtUsuario" name="txtUsuario" class="input-material" />
                      <label for="login-username" class="label-material">Usuário</label>
                    </div>
                    <div class="form-group">
                      <input type="Password" ID="txtSenha" name="txtSenha" class="input-material"></asp:TextBox>
                      <label for="login-password" class="label-material">Senha</label>
                    </div>
                    <input type="submit" id="btnEntrar" name="btnEntrar" value="Entrar" class="btn btn-primary" />
                    <?php
                    if ($msg != ''){
                        echo "<p>". $msg ."</p>";
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/template/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/template/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/template/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/template/js/front.js"></script>
    </form>
</body>
</html>