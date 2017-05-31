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
    <body>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="perfil.php" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../index.html" class="orange-text">Sair</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
          <li><a href="perfil.php" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../index.html" class="orange-text">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="#" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="#"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php session_start(); echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="#"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="#"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><?php echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                </div>
            </nav>
        </div>
        <div class="divider"></div>
        <div class="row">
            <center>
                <div class="section"></div>
                <div class="container" >
                    <div class="section">
                        <div class="nav-wrapper">
                            <h4 class="brand-logo center">Alterar Perfil</h4>
                        </div>
                    </div>
                    <div class="z-depth-1 grey lighten-4 row">
                        <form class="col s12 login-form" method="post" action="perfil.php">
                            <div class='row'>
                                <div class='col s12'>
                                </div>
                            </div>
                            <input type="hidden" name="operacao" value="incluir"/>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8">
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input id="nome" type="text" class="validate" name="nome">
                                    <label for="icon_prefix">Nome</label>
                                </div>
                                <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" type="email" class="validate" name="email">
                                    <label for="icon_telephone">Email</label>
                                </div>
                            <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">location_on</i>
                                    <input id="cidade" type="text" class="validate" name="cidade">
                                    <label for="icon_telephone">Cidade</label>
                                </div>
                            <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="senha" type="password" class="validate" name="senha">
                                    <label for="icon_telephone">Senha</label>
                                </div>
                            <div class="col s2"></div>
                            </div> 
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="descricao" class="materialize-textarea" name="descricao"></textarea>
                                    <label for="textarea1">Escreva uma descrição sobre você.</label>
                                </div>
                            <div class="col s2"></div>
                            </div>                               
                            <center>                                
                                <div class='row'>
                                    <div class="col s2 offset-s5">
                                        <button type='submit' name='incluir' name="incluir" class='col s12 btn btn-small waves-effect waves-light btn'>Alterar</button>   
                                    </div>                                   
                                </div>
                            </center>                                                                                
                            <br>
                            <center>                                
                                <div class='row'>
                                    <div class="col s4 offset-s4">
                                        <a href="perfil.php">Cancelar.</a>   
                                    </div>                                   
                                </div>
                            </center>  
                                    
                        </form>
                    </div>
                </div>
            </center>
</div>

        <div class="divider"></div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript">
        	$(".button-collapse").sideNav();
        </script>
    </body>
</html>