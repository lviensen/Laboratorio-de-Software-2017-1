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
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
          });
        </script>
    </head>
    <?php
      session_start();
      include "../dao/Aula.php";
      $idProf = $_POST['idProf'];
      $idInst = $_POST['idInst'];
      $aula = new Aula;
      $resultado2 = $aula->buscarMatricula($_SESSION['id'], $idProf, $idInst);
      if($resultado2){
        while($linha=mysqli_fetch_assoc($resultado2)){  
          $idMatri=$linha['idMatri'];
          $aula_num=$linha['aula_num'];
        }
      }        
    ?>    

    <!-- Modal Structure -->
    <div id="modalAvaliacao" class="modal">
      <form method="post" action="../controller/controla.php">
        <div class="modal-content">
          <h4 class="center">Avaliação de Professor</h4>
          <p></p>
          <p>Avalie seu professor:</p>       
            <div class="row">
              <div class="col s7">   
                <input type="hidden" name="idMatri" value="<?php echo $idMatri; ?>">
                <input type="hidden" name="operacao" value="avaliar"/>          
                <p>
                  <input name="nota" type="radio" id="test1" value="5"/>
                  <label for="test1">Ótimo</label>
                </p>
                <p>
                  <input name="nota" type="radio" id="test2" value="4" />
                  <label for="test2">Muito bom</label>
                </p>
                <p>
                  <input class="with-gap" name="nota" type="radio" id="test3" value="3" />
                  <label for="test3">Bom</label>
                </p>
                <p>
                  <input name="nota" type="radio" id="test4" value="2"/>
                  <label for="test4">Razoável</label>
                </p>
                <p>
                  <input class="with-gap" name="nota" type="radio" id="test5"  value="1"/>
                  <label for="test5">Ruim</label>
                </p>             
              </div>
            </div>          
        </div>
        <div class="modal-footer">
          <button type="submit" class='btn waves-effect waves-light orange'>Confirmar</button>
        </div>
      </form>
    </div>
    <body class="grey lighten-2">
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="perfil.php" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../controller/sair.php?id='<?php  echo $_SESSION['id'];?>" name="sair" class="orange-text">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="homeAluno.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="mensagensTela.php"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="instrumento.php"><i class="material-icons right">library_music</i> Instrumentos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php  echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                </div>
            </nav>
        </div> 
        <div class="divider"></div>
        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col s7">
                <h3 class="right"><?php echo $_POST['nomeInst']; ?></h3>
              </div>
              <?php  if ($aula_num >= 5) {
                echo "              
                <div class='col s5' >
                  <form method='post' action='./aulaTelaAluno.php'>
                    <a class='waves-effect waves-light btn right blue' href='#modalAvaliacao'>Avaliar Professor<i class='material-icons right'>send</i></a>
                </div> ";
              } ?>
             
            </div>
            <div class="divider"></div>
              <?php
                $resultado = $aula->mostrarAula($idProf, $idInst);
                $contador=0;
                $num_linhas = mysqli_num_rows($resultado);
                if($resultado){
                  while($linha=mysqli_fetch_assoc($resultado)){
                    $descricao=$linha['aulaDescricao'];
                    $idAula=$linha['aulaId'];
                    $contador=$contador+1; ?>
                    <div class="row">
                            <div class="col s12 m12">
                              <div class="card horizontal">
                                <div class="card-image">
                                  <h5 class="center"> &nbsp;  Aula <?php echo $contador; ?></h5>
                                </div>
                                <div class="card-stacked">
                                  <div class="card-content">
                                    <p> <?php echo $descricao; ?> </p>
                                  </div>
                                  <div class="card-action">
                                    <form method="post" action="./aulaTelaAluno.php">
                                      <input type="hidden" name="nomeInst" value="<?php echo $_POST['nomeInst']; ?>">
                                      <input type="hidden" name="idAula" value="<?php echo $idAula; ?>">
                                      <input type="hidden" name="idInst" value="<?php echo $idInst; ?>">
                                      <input type="hidden" name="idProf" value="<?php echo $idProf; ?>">
                                      <input type="hidden" name="idAlu" value="<?php echo $_SESSION['id']; ?>">
                                      <button type="submit" class='btn waves-effect waves-light orange'>Ver aula
                                        <i class='material-icons right white-text'>visibility</i>
                                      </button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div> <?php                
                  }
                  if ($num_linhas==0) { ?>
                    <div class="row">
                      <div class="col s12 center"><span class="flow-text">Você ainda não possui aulas para este intrumento.</span>
                    </div> <?php
                  }
                }  
              ?>
          </div>
        </div>
    </body>
</html>