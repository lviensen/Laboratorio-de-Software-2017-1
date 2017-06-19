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
                  <a href="home.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
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
        <div class="row">
            <center>
                <div class="section"></div>
                <div class="container" >
                    <div class="section">
                        <div class="nav-wrapper">
                            <h4 class="brand-logo center">Atividades</h4>
                        </div>
                    </div>
                    <div class="z-depth-1 grey lighten-4 row">
                        <div class="row">
                            <div class="col s12 m12">
                              <div class="card horizontal">
                                <div class="card-stacked">
                                  <div class="card-content left">
                                    <p>Em qual Universidade o professor Carlos alberto se formou mestre?</p>
                                  </div>
                                  <div class='card-action'>
                                    <form action="#">
                                      <p>
                                        <input class="with-gap" name="group1" type="radio" id="test1" />
                                        <label for="test1">UFSM</label>
                                      </p>
                                      <p>
                                        <input class="with-gap" name="group1" type="radio" id="test2" />
                                        <label for="test2">PUC-RS</label>
                                      </p>
                                      <p>
                                        <input class="with-gap" name="group1" type="radio" id="test3"  />
                                        <label for="test3">UNIPAMPA</label>
                                      </p>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col s12 m12">
                              <div class="card horizontal">
                                <div class="card-stacked">
                                  <div class="card-content left">
                                    <p>Em qual instrumento o professor Carlos Alberto é especializado?</p>
                                  </div>
                                  <div class='card-action'>
                                    <form >
                                      <p>
                                        <input class="with-gap" name="group2" type="radio" id="test4" />
                                        <label for="test4">Guitarra</label>
                                      </p>
                                      <p>
                                        <input class="with-gap" name="group2" type="radio" id="test5" />
                                        <label for="test5">Violão</label>
                                      </p>
                                      <p>
                                        <input class="with-gap" name="group2" type="radio" id="test6"  />
                                        <label for="test6">Clarinete</label>
                                      </p>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <center>                                
                                <div class='row'>
                                    <div class="col s2 offset-s5">
                                        <a type='btn' name='incluir' name="incluir" href="aulaTela.php" class='col s12 btn btn-small waves-effect waves-light btn'>Enviar</a>   
                                    </div>                                   
                                </div>
                            </center>                                                                                
                            <br>
                            <center>                                
                                <div class='row'>
                                    <div class="col s4 offset-s4">
                                        <a href="aulaTela.php">Voltar.</a>   
                                    </div>                                   
                                </div>
                            </center>  
                        </div>
                    </div>
                </div>
            </center>
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