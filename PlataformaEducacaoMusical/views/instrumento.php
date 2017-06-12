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
                  <a href="homeAluno.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="mensagensTela.php"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li class="active"><a href="#"><i class="material-icons right">library_music</i> Instrumentos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php session_start(); echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
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
        <div class="section">
            <div class="nav-wrapper">
                <h4 class="brand-logo center">Lista de Instrumentos</h4>
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
                    include "../dao/Instrumento.php";
                    
                    $inst = new Instrumento;
                    
                    $resultado = $inst->mostrarInstrumento();
                    
                    if($resultado){
                      while($linha=mysqli_fetch_assoc($resultado)){
                        $nome=$linha['nome'];
                        $idInstrumento=$linha['id'];
                        echo "<li class='collection-item'><div>".$nome."<a href='./InstrumentoProfessores.php?id=".$linha['id']."'' class='secondary-content tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ver Professores'><i class='material-icons orange-text'>visibility</i> </a></div></li>";                        
                      }
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