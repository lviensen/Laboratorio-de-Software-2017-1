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
        <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
          $(".button-collapse").sideNav();
          $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
          });
        </script>
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
                  <a href="homeAluno.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="mensagensTela.php"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Instrumentos</a></li>
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
        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col-md-12">
                <ul class="collection with-header">
                  <li class="collection-header"><a href="#" class="brand-logo black-text">Meus Instrumentos</a></li>

                  <?php
                    include "../dao/Instrumento.php";
                    
                    $inst = new Instrumento;
                    
                    $resultado = $inst->mostrarInstrumentoAlu($_SESSION['id']);
                    $num_linhas = mysqli_num_rows($resultado);
                    if($resultado){
                      while($linha=mysqli_fetch_assoc($resultado)){
                        $nomeInst=$linha['nome']; 
                        $nomeProf=$linha['nomeProf'];
                        $idProf=$linha['idProf'];
                        $idInst=$linha['idInst'];
                        ?>
                        <form method="post" action="./instrumentoTelaAluno.php">
                          <input type="hidden" name="nomeInst" value="<?php echo $nomeInst; ?>">
                          <input type="hidden" name="nomeProf" value="<?php echo $nomeProf; ?>">
                          <input type="hidden" name="idInst" value="<?php echo $idInst; ?>">
                          <input type="hidden" name="idProf" value="<?php echo $idProf; ?>">
                          <li class="collection-item"><div><?php echo $nomeInst; ?>  (<?php echo $nomeProf; ?>)<button type="submit" id="botaoVisualizar" class="secondary-content tooltipped white" data-position="bottom" data-delay="50" data-tooltip="Visualizar Instrumento"><i class="material-icons orange-text">visibility</i></button></div></li> </form><?php                    
                      }
                      if ($num_linhas==0) {
                        echo "<li class='collection-item'><div>Você ainda não possui nenhum intrumento<a href='./instrumentoTela.php' class='secondary-content tooltipped'> </a></div></li>";
                      }                      
                    }
                    ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="divider"></div>
        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div class="card-content">
                      <p>Localizar</p>
                    </div>
                    <div class="divider"></div>
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                        <li class="tab"><a href="#instrumentos" class="active orange-text">Instrumentos</a></li>
                        <li class="tab"><a class="orange-text" href="#professores">Professores</a></li>
                      </ul>
                    </div>
                      <div class="card-content grey lighten-4">
                        <div id="instrumentos" class="center"><a class="waves-effect waves-light btn" href="instrumento.php">Ver</a></div>
                        <div id="professores" class="center"><a class="waves-effect waves-light btn" href="professores.php">Ver</a></div>
                      </div>
                  </div>
            </div>
          </div>
        </div>
        </div>
        <div class="divider"></div>
    </body>
</html>