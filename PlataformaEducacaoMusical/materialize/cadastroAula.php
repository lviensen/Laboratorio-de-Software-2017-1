<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="#!" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="index.html" class="orange-text">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="home.php" class="brand-logo">Escola Musical</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="sass.html"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="badges.html"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php session_start(); echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                </div>
            </nav>
        </div>
       <div class="container" >
            <div class="section">
                <div class="nav-wrapper">
                    <h4 class="brand-logo center">Cadastro de aula</h4>
                </div>
            </div>
            <div class="z-depth-1 grey lighten-4 row">
                <form class="col s12 login-form" method="post" action="./controlaAula.php">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <input type="hidden" name="operacao" value="cadastroAula"/>
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s12 m6 l8">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="descricao" class="materialize-textarea" name="descricao"></textarea>
                            <label for="textarea1">Escreva uma descrição sobre a aula.</label>
                        </div>
                        <div class="col s2"></div>
                    </div>
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s12 m6 l8">
                            <i class="material-icons prefix">video_library</i>
                            <input id="nome" type="text" class="validate" name="video">
                            <label for="icon_prefix">Endereço do vídeo</label>
                        </div>
                        <div class="col s2"></div>
                    </div>
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s12 m6 l8">
                            <div class="file-field input-field">
                              <div class="btn orange lighten-3">
                                <span>Arquivo</span>
                                <input type="file">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" name="pdf">
                              </div>
                            </div>
                        </div>
                        <div class="col s2"></div>
                    </div>                    
                    <br>
                    <center>                               
                        <div class='row'>
                            <button type='submit' name='cadastroAula' name="cadastroAula" class='col s12 btn btn-large waves-effect waves-light btn green'>Adicionar</button>
                        </div>
                    </center>
                  </form>
            </div>
        </div>

        <div class="divider"></div>
        <div class="divider"></div>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>