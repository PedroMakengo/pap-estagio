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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;400;700&display=swap" rel="stylesheet">
    <title>Plataforma de Estágio</title>

    <style>
        body ,td,th,
        .navbar-brand,
        h5.text-muted,
        .card-header,
        p, li, a{
            font-family: Roboto !important;
            font-size: 16px;
        }
        .card-static-1 {
            background: -webkit-gradient(linear, right top, left bottom,
            from(#1f6febe6), to(#1f6feb));
        }
        .card-static-2 {
            background: -webkit-gradient(linear, right top, left bottom,
            from(#1f6febe6), to(#1f6feb)) !important;
        }
        .card-static-3 {
            background: -webkit-gradient(linear, right top, left bottom,
            from(#1f6febe6), to(#1f6feb)) !important;
        }
        .card-static-4 {
            background: -webkit-gradient(linear, right top, left bottom,
            from(#13C33B), to(#13C33B)) !important;
        }
        .card-static-1 *, .card-static-2 *,
        .card-static-3 *,  .card-static-4 *,
        .card-static-1 h5.text-muted, .card-static-2 h5.text-muted,
        .card-static-3 h5.text-muted, .card-static-4 h5.text-muted {
            color: #FFF !important;
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
