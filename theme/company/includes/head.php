<!-- Terminar sessão -->
<?php
    require '../../source/Config.php';
    require '../../source/Model.php';
    // Session start
    session_start();
    if(!isset($_SESSION['email']) AND !isset($_SESSION['senha'])):
		header('location: ../../login.php');
		exit();
	endif;

	if(isset($_GET['logout']) && $_GET['logout'] == 'true'):
		session_destroy();
		header("location: ../../login.php");
    endif;
    // Uzar um controlador aqui para efetuar todas as operações de insert
?>
<!-- End sessão -->

<?php

    // Pesquisando se existe o processo do usuário logado
    $parametros = [":email" => $_SESSION['email'], ":senha"=> $_SESSION['senha']];

    $usuarioLogado = new Model();
    $busandoLogadoUsuario = $usuarioLogado->EXE_QUERY("SELECT * FROM tb_empresa
    WHERE email_empresa=:email AND senha_empresa=:senha", $parametros);

    // Pegando o numero de processo
    foreach($busandoLogadoUsuario as $mostrarProcesso):
        $nifVerificado = $mostrarProcesso['nif'];
    endforeach;

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/styles/dashboard.css">
    <link rel="stylesheet" href="../assets/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <title>The end</title>

    <style>
        .fundoCompany {
            background-image: -webkit-gradient(linear, right top, left bottom,
            from(#00D8F3), to(#1f6febe6)), url(../assets/images/systeme/create-1.jpg) !important;
            height: 40vh;
            background-position: center;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        .manterTop {
            margin-top: -12rem
        }

        h1, h2, h3, h4, h5, h6,p,
        a,
        table thead th,
        table tbody td {
          font-family: Poppins !important;
        }

    </style>

</head>
<body>
