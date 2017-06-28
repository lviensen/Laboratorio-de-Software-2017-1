<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <meta charset="utf-8" />
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
          $(".button-collapse").sideNav();
        </script>

    </head>
    <body class="grey lighten-2">
        <?php include "./aviso.php"; ?>
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
                  <a href="homeAluno.php" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="mensagensTela.php"><i class="material-icons right">email</i> Mensagens</a></li>
                    <li><a href="notificacaoTela.php"><i class="material-icons right">info_outline</i> Notificações</a></li>
                    <li><a href="#"><i class="material-icons right">library_music</i> Cursos</a></li>
                    <li><a class="dropdown-button"  href="#!" data-activates="dropdown1"><?php echo $_SESSION['nome']; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
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
            <div class="container">
              <div class="z-depth-1 grey lighten-4 row">
                <div class="col s 12">
                  <div class="row">
                    <div class="col s 12 offset-s1">
                      <h5>Detalhes do usuário</h5>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col s5 offset-s1">
                      <p class="left-align"><a href="perfilEditar.php"><u>Modificar Perfil</u></a></p>
                      <br>                      
                      <p class="left-align">Nome: <?php echo $_POST['nomeProf']; ?></p>
                      <p class="left-align">Email: <?php echo $_POST['emailProf']; ?></p>
                      <p class="left-align">Cidade: <?php echo $_POST['cidProf']; ?></p>
                    </div>
                    <div class="col s6 m6">
                      <div class="card white darken-1">
                        <div class="card-content black-text">
                          <p><?php echo $_SESSION['descricao']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s6 offset-s1">
                      <div class="col s 12 offset-s1">
                        <h5>Cursos do usuário</h5>
                      </div>
                      <?php
                        include "../dao/Instrumento.php";
                        
                        $inst = new Instrumento;
                        
                        $resultado = $inst->mostrarInstrumentoProf($_SESSION['id']);
                        
                        ?>
                      <div class="col s5">            
                      <?php
                        if($resultado){
                          while($linha=mysqli_fetch_assoc($resultado)){
                            $nome=$linha['nome'];
                            echo "<p class='left-align'>".$nome."</p>";                   
                          }
                        }
                      ?>      
                      
                      </div>
                    </div>
                  </div>
                </div>  
                <br><br>              
              </div>
            </div>
        </div>
        <div class="divider"></div>
    </body>
</html>