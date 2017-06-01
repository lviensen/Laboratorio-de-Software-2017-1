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
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="home.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="#"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php session_start(); echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                </div>
            </nav>
        </div>
        <div class="divider"></div>
        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col-md-12">
                <h4 class="center">Mensagens</h4>
              </div>
            </div>
            <div class="divider"></div>
                        <?php
                          include "../dao/Aula.php";
                    
                          $aula = new Aula;
                          
                          $resultado = $aula->mostrarAula();
                          $contador=0;
                          if($resultado){
                            while($linha=mysqli_fetch_assoc($resultado)){
                              $descricao=$linha['descricao'];
                              $contador=$contador+1;
                              echo "<div class='row'>
                                      <div class='col s12 m12'>
                                        <div class='card horizontal'>
                                          <div class='card-image'>
                                            <h5 class='center'>João</h5>
                                          </div>
                                          <div class='card-stacked'>
                                            <div class='card-content'>
                                              <p>Olá! Temos uma boa notícia para você. Nossas novas aulas irão ser disponibilizadas duas vezes por semana a partir de agora.</p>
                                            </div>
                                            <div class='card-action'>
                                              <a href='mensagemTela.php' class='btn waves-effect waves-light orange' type='submit'>Ver conversa
                                              </a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>";                   
                            }
                          }  
                        ?>
          </div>
        </div>
        <div class="divider"></div>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
</html>