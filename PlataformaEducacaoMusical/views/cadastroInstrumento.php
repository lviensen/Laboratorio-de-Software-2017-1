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
          <li><a href="#!" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../controller/sair.php?id='<?php session_start(); echo $_SESSION['id'];?>" name="sair" class="orange-text">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="home.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="mensagensTela.php"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php  echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                </div>
            </nav>
        </div>
       <div class="container" >
            <div class="section">
                <div class="nav-wrapper">
                    <h4 class="brand-logo center">Solicitação de Cadastro de Instrumento</h4>
                </div>
            </div>
            <div class="z-depth-1 grey lighten-4 row">
                <form class="col s12 login-form" method="post" action="../controller/controlaInstrumento.php">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <input type="hidden" name="operacao" value="solicitaCadastroInstrumento"/>
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s12 m6 l8">
                            <i class="material-icons prefix">queue_music</i>
                            <input id="nome" type="text" class="validate" name="nome" required="required">
                            <label for="icon_prefix">Instrumento</label>
                        </div>
                        <div class="col s2"></div>
                    </div>
                    <br>
                    <center>                                
                        <div class='row'>
                            <div class="col s2 offset-s5">
                                <button type='submit'  name="solicitaCadastroInstrumento" class='col s12 btn btn-small waves-effect waves-light btn'>Solicitar</button>   
                            </div>                                   
                        </div>
                    </center> 
                    <br>
                  <center>                                
                      <div class='row'>
                          <div class="col s4 offset-s4">
                              <a class="btn blue accent-1" href="home.php">Voltar</a>   
                          </div>                                   
                      </div>
                  </center> 
                  </form>
            </div>
        </div>

        <div class="divider"></div>
        <div class="divider"></div>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
</html>