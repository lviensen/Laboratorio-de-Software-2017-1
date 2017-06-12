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
    <body >
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="#!" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../index.html" class="orange-text">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="#" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <li><a class="#" href="#!" data-activates="dropdown1"><?php session_start(); echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                </div>
            </nav>
        </div>
        <div class="divider"></div>
        <div class="section">
            <nav class="amber white">
                  <h4 class="black-text center">Painel do Administrador</h4>
            </nav>                
        </div>
        <div class="divider"></div>
        <div class="container">
            <div class="section">
                <table class="responsive-table highlight">
                    <thead>
                      <tr>
                          <th>Instrumento</th>
                          <th>Opções</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Bateria</td>
                        <td><a class="btn-floating"><i class="material-icons green">thumb_up</i></a>       
                        <a class="btn-floating"><i class="material-icons red">thumb_down</i></a></td>
                      </tr>
                      <tr>
                        <td>Pandeiro</td>
                        <td><a class="btn-floating"><i class="material-icons green">thumb_up</i></a>       
                        <a class="btn-floating"><i class="material-icons red">thumb_down</i></a></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="divider"></div>            

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
</html>