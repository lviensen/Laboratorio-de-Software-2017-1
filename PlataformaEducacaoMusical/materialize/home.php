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
          <li><a href="sair.php" class="orange-text">Sair</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
          <li><a href="#!" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="sair.php" class="orange-text">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="#" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="sass.html"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="badges.html"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php session_start(); echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="sass.html"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="sass.html"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="badges.html"><i class="material-icons right">library_music</i> Cursos</a></li>
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
                    include "Instrumento.php";
                    
                    $inst = new Instrumento;
                    
                    $resultado = $inst->mostrarInstrumento();
                    
                    if($resultado){
                      while($linha=mysqli_fetch_assoc($resultado)){
                        $nome=$linha['nome'];
                        echo "<li class='collection-item'><div>".$nome."<a href='instrumentoTela.php'' class='secondary-content'><i class='material-icons orange-text'>visibility</i></a></div></li>";                        
                      }
                    }
                    ?>
                </ul>
                <a class="right btn-floating waves-effect waves-light red" href="cadastroInstrumento.php"><i class="material-icons">add</i></a>
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
                        echo "<li class='collection-item'><div>".$nome."<a href='#!'' class='secondary-content'><i class='material-icons orange-text'>visibility</i></a></div></li>";                        
                      }
                    }
                    ?>
                </ul>
                <a class="right btn-floating waves-effect waves-light red" href="cadastroInstrumento.php"><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="divider"></div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
        	$(".button-collapse").sideNav();
        </script>
    </body>
</html>