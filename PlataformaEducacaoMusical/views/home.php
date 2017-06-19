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
          $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal').modal();
        });
        </script>

    </head>

    <body class="grey lighten-2">
        <!-- Modal Structure
        <div id="modal1" class="modal">
          <div class="modal-content">
            <h4>Cadastrar-se!</h4>
            <p>Deseja realmente cadastrar-se a este instrumento?</p>
          </div>
          <div class="modal-footer">
            <form method="post" action="../controller/controla.php">
              <input type="hidden" name="operacao" value="cadastrarProfInst"/>
              <input type="hidden" name="idInst" value="<?php //session_start(); echo $_SESSION['idInst']; ?>"/>
              <input type="hidden" name="idProf" value="<?php// echo $_SESSION['id']; ?>"/>
              <button class="modal-action modal-close waves-effect waves-green btn-flat green" type='submit' name='cadastrarProfInst'>Sim</button>
            </form>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"> Não</a>
          </div>
        </div> -->
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="perfil.php" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../controller/sair.php?id='<?php session_start(); echo $_SESSION['id'];?>" name="sair" class="orange-text">Sair</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
          <li><a href="perfil.php" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <form method="post" action="../controller/controla.php">
            <li><button href="  class="orange-text">Sair</button></li>
          </form>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="#" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="mensagensTela.php"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Cursos</a></li>
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
                    
                    $resultado = $inst->mostrarInstrumentoProf($_SESSION['id']);
                    $num_linhas = mysqli_num_rows($resultado);
                    if($resultado){
                      while($linha=mysqli_fetch_assoc($resultado)){
                        $nome=$linha['nome']; 
                        $idInst=$linha['idInst']; ?>
                          <form method="post" action="./instrumentoTela.php">
                          <input type="hidden" name="idInst" value="<?php echo $idInst; ?>">
                          <input type="hidden" name="nomeInst" value="<?php echo $nome; ?>">
                          <li class="collection-item"><div><?php echo $nome; ?><button  class="secondary-content tooltipped white" data-position="bottom" data-delay="50" data-tooltip="Visualizar Instrumento" type="submit"><i class="material-icons orange-text">visibility</i></button></div></li></form><?php ;                        
                      }
                      if ($num_linhas==0) {
                        echo "<li class='collection-item'><div>Você ainda não possui nenhum intrumento<a href='./instrumentoTela.php'' class='secondary-content tooltipped' </a></div></li>";
                    }
                    }
                    

                    ?>
                </ul>
                <a class="right btn-floating waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Adicionar Instrumento" href="cadastroInstrumento.php" ><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="divider"></div>
        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col-md-12">
                <ul class="collection with-header">
                  <li class="collection-header"><a href="#" class="brand-logo black-text">Outros Instrumentos</a></li>
                  <?php
                    
                    $resultado = $inst->mostrarInstrumento();
                    
                    if($resultado){
                      while($linha=mysqli_fetch_assoc($resultado)){
                        $nome=$linha['nome'];
                        $id=$linha['id']; ?>
                        <form method="post" action="../controller/controla.php">
                          <input type="hidden" name="operacao" value="cadastrarProfInst"/>
                          <input type="hidden" name="idInst" value="<?php echo $id; ?>"/>
                          <input type="hidden" name="idProf" value=" <?php echo $_SESSION["id"]; ?>"/> <li class="collection-item"><div> <?php echo $nome; ?><button class="secondary-content tooltipped white" data-position="bottom" data-delay="50"  data-tooltip="Cadastrar-se" type="submit" name="cadastrarProfInst"><i class="material-icons green-text" >add</i></button></div></li></form> <?php                        
                      }
                    }
                    ?>
                </ul>
                <a class="right btn-floating waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Adicionar Instrumento" href="cadastroInstrumento.php" ><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="divider"></div>

        <script type="text/javascript">
        	$(".button-collapse").sideNav();
          $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
          });
        </script>
    </body>
</html>