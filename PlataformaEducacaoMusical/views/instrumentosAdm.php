<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
         <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript">
          $(".button-collapse").sideNav();
          $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
          });
        </script>
        <script type="text/javascript" src="../js/javascriptPesquisar.js"></script>
        <style>
          #botaoVisualizar{
            border: none;
          }
        </style>
    </head>
    <body class="grey lighten-2">
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="perfil.php" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../controller/sair.php?id='<?php session_start(); echo $_SESSION['id'];?>" name="sair" class="orange-text">Sair</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
          <li><a href="perfil.php" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../index.html" class="orange-text">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="adm.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="#"><i class="material-icons right">library_music</i> Instrumentos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php  echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="#"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="#"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <a class="btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am tooltip">Hover me!</a>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><?php echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                </div>
            </nav>
        </div>
        <div class="divider"></div>
        <div class="section">
            <div class="nav-wrapper">
                <h4 class="brand-logo center">Lista de Instrumentos</h4>
            </div>
        </div>
        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col-md-12">
                <ul class="collection with-header">
                  <li class="collection-header">                        
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                          <div class="col-sm-10">
                              <input type="hidden" name="nomeInst" value="<?php echo $nome; ?>">
                              <input type="hidden" name="idInst" value="<?php echo $idInstrumento; ?>">                              
                              <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Buscar">
                          </div>
                      </div>        
                    </form>
                  </li>
            <ul class='resultado'><br><br>        
            </ul>
                  <?php
                    include "../dao/Instrumento.php";
                    
                    $inst = new Instrumento;
                    
                    $resultado = $inst->mostrarInstrumento();
                    
                    if($resultado){
                      while($linha=mysqli_fetch_assoc($resultado)){ ?><?php 
                        $nome=$linha['nome'];
                        $idInstrumento=$linha['id']; ?>
                          <li class="collection-item"><div><?php echo $nome; ?><button type="submit" id="botaoVisualizar"  class="secondary-content tooltipped white" data-position="bottom" data-delay="50" data-tooltip="Ver Professores"></button></div></li><?php                        
                      }
                    }
                    ?>
                </ul>
              </div>
            </div>
          </div>
        </div>





    </body>
</html>