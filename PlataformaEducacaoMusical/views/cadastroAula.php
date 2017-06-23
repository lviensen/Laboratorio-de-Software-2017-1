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
        <script type="text/javascript"> 
          $(document).ready(function(){
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
          });
        </script>
    </head>
    <body class="grey lighten-2">
      <!-- Modal Structure -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Tutorial adicionar vídeo</h4>
          <p><b>Passo 1:</b> No YouTube abra o vídeo que você deseja adicionar.</p>
          <p><b>Passo 2:</b> Clique em "Compartilhar" abaixo do vídeo.</p>
          <p><b>Passo 3:</b> Clique em "Incorporar".</p>
          <p><b>Passo 3:</b> Selecione o link como no exemplo abaixo:</p>
          <img class="responsive-img" src="../img/tutorial.png">
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
      </div>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="#!" class="orange-text">Perfil</a></li>
          <li class="divider"></li>
          <li><a href="../controller/sair.php?id='<?php session_start(); $codigoInst = $_POST["idInst"]; echo $_SESSION['id'];?>" name="sair" class="orange-text">Sair</a></li>
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
                    <h4 class="brand-logo center">Cadastro de aula</h4>
                </div>
            </div>
            <div class="z-depth-1 grey lighten-4 row">
                <form class="col s12 login-form" method="post" action="../controller/controlaAula.php" enctype="multipart/form-data">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                    <input type="hidden" name="operacao" value="cadastroAula"/>
                    <input type="hidden" name="idInst" value="<?php echo $codigoInst; ?>"/>
                    <input type="hidden" name="idProf" value="<?php echo $_SESSION['id']; ?>"/>
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s12 m6 l8">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="descricao" class="materialize-textarea" name="descricao" required="required"></textarea>
                            <label for="textarea1">Escreva uma descrição sobre a aula.</label>
                        </div>
                        <div class="col s2"></div>
                    </div>
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s7 m6 l8">
                            <i class="material-icons prefix">video_library</i>
                            <input id="nome" type="text" class="validate" name="video" required="required">
                            <label for="icon_prefix">Endereço do vídeo</label>
                        </div>
                        <div class="col s2"><a class="waves-effect waves-light btn tooltipped yellow black-text" data-position='bottom' data-delay='50' data-tooltip='Tutorial para adicionar vídeo' href="#modal1" >Dica</a></div>
                    </div>
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s12 m6 l8">
                            <div class="file-field input-field">
                              <div class="btn orange lighten-1">
                                <span>Arquivo</span>
                                <input type="file" name="fileUpload">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" name="pdf" required="required" name="fileUpload">
                              </div>
                            </div>
                        </div>
                        <div class="col s2"></div>
                    </div>     
                    <!-- <div class="row">
                        <div class="col s4"></div>
                        <div class="col s8 m6 l8 offset-s2">
                            <h5>Atividades:</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s12 m6 l8 ">
                            <i class="material-icons prefix">assignment</i>
                            <input id="cidade" type="text" class="validate" name="pergunta">
                            <label for="icon_telephone">Pergunta</label>
                        </div>
                    <div class="col s2"></div>
                    </div>
                    <div class="row">
                        <div class="col s3"></div>
                        <div class="input-field col s8 m4 l7 ">
                            <input id="cidade" type="text" class="validate" name="cidade">
                            <label for="icon_telephone">Alternativa 1</label>
                        </div>
                    <div class="col s2"></div>
                    </div>
                    <div class="row">
                        <div class="col s3"></div>
                        <div class="input-field col s8 m4 l7 ">
                            <input id="cidade" type="text" class="validate" name="cidade">
                            <label for="icon_telephone">Alternativa 2</label>
                        </div>
                    <div class="col s4"></div>
                    </div>
                    <div class="row">
                        <div class="col s3"></div>
                        <div class="input-field col s8 m4 l7 ">
                            <input id="cidade" type="text" class="validate" name="cidade">
                            <label for="icon_telephone">Alternativa 3</label>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col s8"></div>
                        <div class="col s3 m2 l2">
                            <a class="right btn-floating waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Adicionar outra Pergunta" href="cadastroInstrumento.php" ><i class="material-icons">add</i></a>   
                        </div>
                    </div>-->
                    <br><br>              
                    <center>                               
                        <div class='row'>
                            <div class="col s2 offset-s5">
                                <button type='submit' name='cadastroAula' name="cadastroAula" class='col s12 btn btn-small waves-effect waves-light btn green'>Adicionar</button>
                            </div>
                        </div>
                    </center>
                    <br>
                    <center>                                
                        <div class='row'>
                            <div class="col s4 offset-s4">
                                <a href="instrumentoTela.php">Voltar</a>   
                            </div>                                   
                        </div>
                    </center> 
                  </form>
            </div>
        </div>
    </body>
</html>