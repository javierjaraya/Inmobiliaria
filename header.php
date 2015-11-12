<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inmobiliaria</title>       
        <link rel="Shortcut Icon" href="Files/img/favicon.jpg" type="image/x-icon">        
        <!-- JQUERY -->
        <script src="Files/js/jquery.min.js" ></script>
        <!-- BXSLIDER-->
        <link href="Files/plugins/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
        <script src="Files/plugins/jquery.bxslider/jquery.bxslider.min.js" ></script> 
        <script type="text/javascript" >
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    auto: true,
                    autoControls: false
                });
                
                var map = new GMap(document.getElementById("map"));
                map.setMapType(G_SATELLITE_TYPE);
                map.addControl(new GLargeMapControl());
                map.addControl(new GMapTypeControl());
                map.centerAndZoom(new GPoint(-3.688788414001465, 40.41996541363825), 3);
            });
        </script>
        
        <!-- BOOTSTRAP Latest compiled and minified CSS -->
        <link rel="stylesheet" href="Files/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css" crossorigin="anonymous">
        <!-- BOOTSTRAP Optional theme -->
        <!--<link rel="stylesheet" href="Files/plugins/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" crossorigin="anonymous">-->
        <!-- BOOTSTRAP Latest compiled and minified JavaScript -->
        <script src="Files/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>       
        <link rel="stylesheet" href="Files/css/estilo.css">
    </head>
    <body>
        <!-- Docs master nav -->
        <header class=bs-docs-nav">
            <div class="container">
                <!-- Header-->
                <div class="row">
                    <div class="col-xs-9 logo"  >
                        <img src="Files/img/logo.jpg">
                    </div>
                    <!-- Social -->
                    <div class="col-xs-3 sociales">                                                
                        <a id="facebook" href=""><img src="Files/img/icono_facebook.png"></a>
                        <a id="twitter" href=""><img src="Files/img/icono_twitter.png"></a>
                    </div>
                </div>
                <!-- Nav-->
                <div class="row">                    
                    <nav class="navbar navbar-default menu" role="navigation">
                        <!-- El logotipo y el icono que despliega el menú se agrupan
                             para mostrarlos mejor en los dispositivos móviles -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Desplegar navegación</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                             otro elemento que se pueda ocultar al minimizar la barra -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">                            
                            <ul class="nav navbar-nav navbar-right">
                                <li> <!--class='active'--><a href='index.php'>Inicio</a></li>
                                <li><a href='modelos.php'>Modelos</a></li>
                                <li><a href='quienesSomos.php'>Quienes Somos</a></li>
                                <li><a href='contactanos.php'>Contactanos</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>        
        <!-- Docs page layout -->
        <div class="bs-docs-container">
