<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
    </head>
    <body >
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li class="divider"></li>
          <li><a href="../controller/sair.php?id='<?php session_start(); echo $_SESSION['id'];?>" name="sair" class="orange-text">Sair</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
          <li class="divider"></li>
          <form method="post" action="../controller/controla.php">
            <li><button href="  class="orange-text">Sair</button></li>
          </form>
        </ul>
        <div class="navbar-fixed">
            <nav class="amber darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="#" class="brand-logo" style="margin-left: 5%;">Escola Musical</a>
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
                    <?php 
                      include "../dao/Instrumento.php";
                      $inst = new Instrumento;

                      $resultado = $inst->mostrarInstSolicitados();
                      $num_linhas = mysqli_num_rows($resultado);
                      if($resultado){
                        while($linha=mysqli_fetch_assoc($resultado)){
                          $nome=$linha['nomeInstSolicitado'];
                          $id=$linha['idInstSolicitado']; ?>
                          <form method="post" action="../controller/controlaInstrumento.php">
                            <input type="hidden" name="operacao" value="cadastroInstrumento"/>
                            <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <tbody>
                              <tr>
                                <td> <?php echo $nome; ?> </td>
                                <td><button type="submit" class="btn-floating"><i class="material-icons green">thumb_up</i></button>   
                                <button type="submit" class="btn-floating"><i class="material-icons red">thumb_down</i></button></td>
                              </tr>
                            </tbody>
                          </form>
                       <?php }
                      }
                    ?>
                  </table>
            </div>
        </div>
        <div class="divider"></div>            
    </body>
</html>