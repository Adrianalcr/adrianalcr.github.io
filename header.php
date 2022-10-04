<?php
session_start();
ob_start();
$_SESSION['nonce'] = md5(microtime(true));
$string = bin2hex(openssl_random_pseudo_bytes(32));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Portfólio profissional, especialista em tecnologia da informação.">
    <meta name="author" content="Adriana Lima">
    <link rel="shortcut icon" href="assets/images/logo-4.png" type="image/x-ico">

    
    <!-- Styles CSS -->
    <link rel="stylesheet" href="assets/css/index.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Fonts CSS -->
    <link href="assets/fonts/fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        
    <title> Adriana Lima Dev Full Stack</title>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Tag Manager -->
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N8FVBKX');
    </script>
    <!-- End Google Tag Manager -->

    oncontextmenu="return false"
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8FVBKX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky header-section--hero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index" class="logo">
                            <img src="assets/images/logo-name.png" alt="Adriana Lima" rel="noopener noreferrer">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Skills</a></li>
                            <li class="scroll-to-section"><a href="#courses">Formação</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">Portfólio</a></li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">+Páginas</a>
                                <ul class="sub-menu">
                                    <li><a href="sobre" rel="noopener noreferrer">Sobre ela</a></li>
                                    <li><a href="curriculum" rel="noopener noreferrer">Curriculum</a></li>
                                    <li><a href="blog" rel="noopener noreferrer">Novidades</a></li>
                                    <li><a href="temas.php" rel="noopener noreferrer">Temas</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#testimonials">Clientes</a></li>
                            <li class="scroll-to-section"><a href="#contact-section">Contato</a></li>
                            <!--<li class="scroll-to-section"><a href="./private/index.php" target="_blank"><i class="fa fa-sign-in"></i></a></li>-->
                            <button type="button" class="rounded-pill btn-rounded">
                                <a href="loja.php" target="_blank" rel="noopener noreferrer">
                                    Loja
                                    <span><i class="fa fa-solid fa-cart-shopping"></i></span>
                                </a>
                            </button>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->