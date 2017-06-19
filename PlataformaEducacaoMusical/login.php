<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>


    </head>
    <body class="grey lighten-2">
        <?php 
            session_start();
            
            if (isset($_SESSION['verificador']) && isset($_SESSION['mensagem'])) { ?>
                <div id="snackbar"><div class="mdl-spinner mdl-js-spinner is-active"></div> <?php echo  $_SESSION['mensagem']; ?> </div>

                <style>
                    #snackbar {
                        visibility: hidden; /* Hidden by default. Visible on click */
                        min-width: 250px; /* Set a default minimum width */
                        margin-left: -125px; /* Divide value of min-width by 2 */
                        background-color: #333; /* Black background color */
                        color: #fff; /* White text color */
                        text-align: center; /* Centered text */
                        border-radius: 2px; /* Rounded borders */
                        padding: 16px; /* Padding */
                        position: fixed; /* Sit on top of the screen */
                        z-index: 1; /* Add a z-index if needed */
                        left: 50%; /* Center the snackbar */
                        bottom: 30px; /* 30px from the bottom */
                    }
                    /* Show the snackbar when clicking on a button (class added with JavaScript) */
                    #snackbar.show {
                        visibility: visible; /* Show the snackbar */
                        /* Add animation: Take 0.5 seconds to fade in and out the snackbar. 
                        However, delay the fade out process for 2.5 seconds */
                        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                        animation: fadein 0.5s, fadeout 0.5s 2.5s;
                    }
                    /* Animations to fade the snackbar in and out */
                    @-webkit-keyframes fadein {
                        from {bottom: 0; opacity: 0;} 
                        to {bottom: 30px; opacity: 1;}
                    }
                    @keyframes fadein {
                        from {bottom: 0; opacity: 0;}
                        to {bottom: 30px; opacity: 1;}
                    }
                    @-webkit-keyframes fadeout {
                        from {bottom: 30px; opacity: 1;} 
                        to {bottom: 0; opacity: 0;}
                    }
                    @keyframes fadeout {
                        from {bottom: 30px; opacity: 1;}
                        to {bottom: 0; opacity: 0;}
                    }
                </style>

                <script>
                    window.onload = toast;
                    
                    function toast() {
                        // Get the snackbar DIV
                        var x = document.getElementById("snackbar");
                        // Add the "show" class to DIV
                        x.className = "show";
                        // After 3 seconds, remove the show class from DIV
                        setTimeout(function () {
                            x.className = x.className.replace("show", "");
                        }, 6000);
                    }
                </script>

                <?php 
                    }session_destroy();
                ?>

    <div>
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

    </body>
</html>