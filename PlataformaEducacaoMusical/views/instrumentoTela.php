<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="grey lighten-2">
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="perfil.php" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../controller/sair.php?id='<?php session_start(); $codigo = $_POST['idInst']; echo $_SESSION['id'];?>" name="sair" class="orange-text">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="home.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="mensagensTela.php"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                </div>
            </nav>
        </div>
        <div class="divider"></div>      
        <div class="container">
          <div class="section">
            <div class="row">
              <form method="post" action="./alunosTela.php">
                <input type="hidden" name="idInst" value="<?php echo $codigo; ?>">
                <input type="hidden" name="idProf" value="<?php echo $_SESSION['id']; ?>">
                <input type="hidden" name="nomeInst" value="<?php echo $_POST['nomeInst']; ?>">
                <div class="col s3">
                  <button class="waves-effect waves-light btn  amber lighten-1" type="submit">Ver alunos</button>
                </div>   
              </form>         
              <div class="col s6">
                <h3 class="center"><?php echo  $_POST['nomeInst']; ?>
                </h3>
              </div>
              <?php 
                include "../dao/Aula.php";
                $u = new Aula;
                $resultado3 = $u->buscarNota($_SESSION['id'], $codigo);
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
              <div class="col s3">
                <h5>Avaliado como: <?php echo $nota; ?></h5>
              </div>
            </div>
              <?php
                
                
                $aula = new Aula;
                
                $resultado = $aula->mostrarAula($_SESSION['id'], $codigo);
                $num_linhas = mysqli_num_rows($resultado);
                $contador=0;
                if($resultado){
                  while($linha=mysqli_fetch_assoc($resultado)){
                    $descricao=$linha['aulaDescricao'];
                    $contador=$contador+1; 
                    $aulaId=$linha['aulaId']; ?>
                    <div class='row'>
                      <div class='col s12 m12'>
                        <div class='card horizontal'>
                          <div class='card-image'>
                            <h5 class='center'> &nbsp;   Aula <?php echo $contador; ?></h5>
                          </div>
                          <div class='card-stacked'>
                            <div class='card-content'>
                              <p><?php echo $descricao; ?></p>
                            </div>
                            <form method="post" action="./aulaTela.php">
                              <input type="hidden" name="idInst" value="<?php echo $codigo; ?>">
                              <input type="hidden" name="nomeInst" value="<?php echo $_POST['nomeInst']; ?>">
                              <input type="hidden" name="aulaId" value="<?php echo $aulaId; ?>">
                              <input type="hidden" name="profId" value="<?php echo $_SESSION['id']; ?>">   
                              <div class='card-action'>
                                <button  class='btn waves-effect waves-light orange' type='submit'>Ver aula
                                  <i class='material-icons right white-text'>visibility</i>
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div><?php  ;

                  }
                  if ($num_linhas==0) { ?>
                    <div class="row">
                      <div class="col s12 center"><span class="flow-text">Você ainda não possui aulas para este intrumento.</span>
                    </div> <?php
                  } 
                }  
              ?>
          <br><br>    
          <center>                                
              <div class='row'>
                  <div class="col s4 offset-s4">
                      <a class="btn blue accent-1" href="home.php">Voltar</a>   
                  </div>                                   
              </div>
          </center>           
          </div>
          <form method="post" action="./cadastroAula.php">
            <input type="hidden" name="idInst" value="<?php echo $codigo; ?>">
            <input type="hidden" name="nomeInst" value="<?php echo $_POST['nomeInst']; ?>">
              <div class='divider'></div>
              <div class='fixed-action-btn'>
              <button class='btn-floating btn-large red tooltipped' data-position='top' data-delay='50' data-tooltip='Cadastrar Aula' type="submit">
                <i class='large material-icons'>add</i>
              </button>
            </div>
          </form>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
</html>