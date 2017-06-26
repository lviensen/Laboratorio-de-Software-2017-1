<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
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
        <?php
          include "../dao/Usuario.php";
          $codigo = $_POST['idInst'];
          $i = new Usuario;
          $resultado2 = $i->dadosInstrumento($codigo);
          if ($resultado2) {
            while($linha=mysqli_fetch_assoc($resultado2)){
              $nomeInstrumento=$linha['nome'];
            }
          }
        ?> 
        <div class="divider"></div>
        <div class="section">
            <div class="nav-wrapper">
                <h4 class="brand-logo center">Lista de Professores de <?php echo $nomeInstrumento; ?></h4>
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
                              <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Buscar">
                          </div>
                      </div>    
                    </form>
                  </li>

                  <?php
                    $u = new Usuario;
                    $resultado = $u->mostrarProfessorInstrumento($codigo);
                    
                    if($resultado){
                      while($linha=mysqli_fetch_assoc($resultado)){
                        $nome=$linha['nomeProf']; 
                        $idProf=$linha['idProf'];
                        ?>

                        <form method="post" action="../controller/controla.php">
                          <input type="hidden" name="operacao" value="cadastroAlunoInstrumentoProfessor">
                          <input type="hidden" name="idInst" value="<?php echo $codigo; ?>">
                          <input type="hidden" name="idProf" value="<?php echo $linha['idProf']; ?>">    
                          <input type="hidden" name="idAlu" value="<?php echo $_SESSION['id']; ?>">                      
                          <li class='collection-item'>
                            <div><?php echo $nome; ?>     
                              <?php 
                                $resultado3 = $u->buscarNota($idProf, $codigo);
                                if($resultado3){
                                  while($linha=mysqli_fetch_assoc($resultado3)){
                                    if (is_null($linha['nota'])) {
                                      $nota='Ainda não avaliado';
                                    }
                                    if ($linha['nota'] <=1 && $linha['nota'] > 0) {
                                      $nota='Ruim';
                                    }
                                    elseif ($linha['nota'] <=2 && $linha['nota'] > 1) {
                                      $nota='Razoável';
                                    }
                                    elseif ($linha['nota'] <=3 && $linha['nota'] > 2) {
                                      $nota='Bom';
                                    }
                                    elseif ($linha['nota'] <=4 && $linha['nota'] > 3) {
                                      $nota='Muito bom';
                                    }
                                    elseif ($linha['nota'] <=5 && $linha['nota'] > 4) {
                                      $nota='Ótimo';
                                    }
                                  }
                                }
                              ?>                    
                              <button type="submit" class='secondary-content tooltipped white' id="botaoVisualizar" data-position='bottom' data-delay='50' data-tooltip='Cadastrar-se'><i class='material-icons green-text'>add </i> </button> </form>
                          <a href='./perfil.php'' class='secondary-content tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ver Perfil'> <i class='material-icons orange-text'> visibility </i></a> 
                          <a href='./instrumentoTela.php'' class='secondary-content tooltipped black-text' data-position='bottom' data-delay='50' data-tooltip='Pontuação'> <?php echo $nota; ?>  &nbsp; </a></div></li>   
                      <?php } 
                    }
                    ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript">
          $(".button-collapse").sideNav();
          $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
          });
        </script>
    </body>
</html>