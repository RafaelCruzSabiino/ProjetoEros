<?php
    session_start();

    if(!isset($_SESSION["DadosUser"]["Id"]))
    {
      session_reset();
      session_destroy();
      header("Location: ../Controllers/Gerenciar.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>EROS</title>

    <link href="../FrontEnd/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../FrontEnd/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../FrontEnd/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../FrontEnd/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../FrontEnd/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="../FrontEnd/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="../FrontEnd/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../FrontEnd/build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title">
              <a href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Inicio" class="site_title"><img src="../FrontEnd/images/Eros.png" style="width: 35px;" class="img-circle" alt="Image"> <span>EROS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <a href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Perfil"><img src="data:image/png;base64,<?= $_SESSION["DadosUser"]['Inicial'] ?>" class="img-circle profile_img"></a>
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
                <h2><?= $_SESSION["DadosUser"]['Abreviacao'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <?php if($_SESSION["DadosUser"]["Tipo"] != "PJ"){ ?>
                    <li class=""><a href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Entrar"><i class="fa fa-external-link"></i> Entrar Balada </a></li>
                  <?php } ?>
                  <li><a href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Amigos"><i class="fa fa-group"></i> Amigos </a></li>
                  <?php if($_SESSION["DadosUser"]["Tipo"] == "PJ"){ ?>
                    <li><a><i class="fa fa-desktop"></i> Pesquisas </a></li>
                  <?php } ?>
                  <li><a href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Chat"><i class="fa fa-comments-o"></i> Chat </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class="navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="data:image/png;base64,<?= $_SESSION["DadosUser"]['Inicial'] ?>" alt=""><label><?= $_SESSION["DadosUser"]['Nome'] ?></label>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Perfil"> Perfil <i class="fa fa-user pull-right"></i></a>
                    <a class="dropdown-item"  href="#"> Configurações<i class="fa fa-cogs pull-right"></i></a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span>Ajuda</span><i class="fa fa-info pull-right"></i>
                      </a>
                    <a class="dropdown-item"  href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=LogOut"><i class="fa fa-sign-out pull-right"></i> Sair</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Chat" id="navbarDropdown1" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="right_col" role="main">
