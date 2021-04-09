<?php
ini_set('default_charset','UTF-8');

session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["usuario"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: login.php");
exit;
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administração Kabum!</title>
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
    <!-- sweet alert -->
    <link href="/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/template/css/style.default.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/template/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
        <div class="page home-page">
            <!-- Main Navbar-->
            <?php include "header.php"; ?>
            <div class="page-content d-flex align-items-stretch">
                <!-- Side Navbar -->
                <?php include "nav.php"; ?>

                <div class="content-inner">                       
                    <!-- Dashboard Section-->
                    <?php 

                    $page = $_GET["page"];

                    if ($page == ""){$page="home";}

                    include $page . ".php"; 

                    ?>
                    <!-- Page Footer-->
                    <?php include "footer.php"; ?>
                </div>
            </div>
        </div>
        <!-- Javascript files-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="/template/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="/template/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="/template/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="/template/js/front.js"></script>
        <script src="/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="/template/js/jquery.mask.min.js"></script>
        <script src="/template/js/mascaras.js"></script>

</body>
</html>