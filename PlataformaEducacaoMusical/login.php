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
   
    <body class="grey lighten-2">


        <div class="row">

            <center>
                <div class="section"></div>
                <div class="container" >
                    <nav class=" amber darken-4 z-depth-3">
                        <div class="nav-wrapper">
                            <a class="brand-logo center" href="index.html">Escola Musical</a>
                        </div>
                    </nav>
                    <div class="section">
                        <div class="nav-wrapper">
                            <h4 class="brand-logo center">Login</h4>
                        </div>
                    </div>
                    <div class="z-depth-1 grey lighten-4 row">
                        <form class="col s12 login-form" method="post" action="./controller/controla.php">
                            <div class='row'>
                                <div class='col s12'>
                                </div>
                            </div>

                            <input type="hidden" name="operacao" value="logar"/>

                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" type="email" class="validate" name="email">
                                    <label for="icon_prefix">Email</label>
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
                            <center>                                
                                <div class='row'>
                                    <div class="col s3 offset-s4">
                                     <button type='submit' name='logar' class='col s12 btn btn-small waves-effect   green darken-1'>Entrar</button>   
                                    </div>                                   
                                </div>
                            </center>
                            <center>                                
                                <div class='row'>
                                    <div class="col s3 offset-s4">
                                        <a href="cadastro.php">Criar um conta</a>  
                                    </div>                                   
                                </div>
                            </center>
                                            

                        </form>
                    </div>
                </div>
            </center>
</div>

            <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>