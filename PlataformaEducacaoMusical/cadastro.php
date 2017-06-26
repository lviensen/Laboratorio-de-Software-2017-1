<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script>
            $(document).ready(function () {
                $('select').material_select();
            });
        </script>
    </head>
    <body class="grey lighten-2">
        <?php include "views/aviso.php"; ?>
        <div class="row">
            <center>
                <div class="section"></div>
                <div class="container" >
                    <nav class=" amber darken-4 z-depth-3">
                        <div class="nav-wrapper">
                            <a href="index.html" class="brand-logo center">Escola Musical</a>
                        </div>
                    </nav>
                    <div class="section">
                        <div class="nav-wrapper">
                            <h4 class="brand-logo center">Cadastro</h4>
                        </div>
                    </div>
                    <div class="z-depth-1 grey lighten-4 row">
                        <form class="col s12 login-form" method="post" action="./controller/controla.php">
                            <div class='row'>
                                <div class='col s12'>
                                </div>
                            </div>
                            <input type="hidden" name="operacao" value="incluir"/>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8">
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input id="nome" type="text" class="validate" name="nome" required="required">
                                    <label for="icon_prefix">Nome</label>
                                </div>
                                <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" type="email" class="validate" name="email" required="required">
                                    <label for="icon_telephone">Email</label>
                                </div>
                            <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">location_on</i>
                                    <input id="cidade" type="text" class="validate" name="cidade" required="required">
                                    <label for="icon_telephone">Cidade</label>
                                </div>
                            <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="senha" type="password" class="validate" name="senha" required="required">
                                    <label for="icon_telephone">Senha</label>
                                </div>
                            <div class="col s2"></div>
                            </div> 
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="descricao" class="materialize-textarea" name="descricao" required="required"></textarea>
                                    <label for="textarea1">Escreva uma descrição sobre você.</label>
                                </div>
                            <div class="col s2"></div>
                            </div>  
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                  <select name="tipo" required="required">
                                    <option value="" disabled selected>Eu sou</option>
                                    <option value="aluno">Aluno</option>
                                    <option value="professor">Professor</option>
                                  </select>                                  
                                </div>
                            <div class="col s2"></div>
                            </div>                             
                            <center>                                
                                <div class='row'>
                                    <div class="col s2 offset-s5">
                                        <button type='submit' name='incluir' name="incluir" class='col s12 btn btn-small waves-effect waves-light btn'>Cadastrar</button>   
                                    </div>                                   
                                </div>
                            </center>                                                                                
                            <br>
                            <center>                                
                                <div class='row'>
                                    <div class="col s4 offset-s4">
                                        <a href="login.php">Já possuo uma conta. Fazer login.</a>   
                                    </div>                                   
                                </div>
                            </center>  
                                    
                        </form>
                    </div>
                </div>
            </center>
</div>

    </body>
</html>