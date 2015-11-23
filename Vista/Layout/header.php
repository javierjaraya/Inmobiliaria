<?php
session_start();
if ($_SESSION["autentificado"] != "SI")
    header('Location: ../../index.php');

$perfil = $_SESSION["idPerfil"];
?>
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
        <link rel="Shortcut Icon" href="../../Files/img/favicon.jpg" type="image/x-icon">        
        <!-- JQUERY -->
        <script src="../../Files/js/jquery.min.js" ></script>
        <!-- BXSLIDER-->
        <link href="../../Files/plugins/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
        <script src="../../Files/plugins/jquery.bxslider/jquery.bxslider.min.js" ></script> 
        <script type="text/javascript" >
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    auto: true,
                    autoControls: false
                });
            });
        </script>

        <!-- BOOTSTRAP Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../../Files/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css" crossorigin="anonymous">
        <!-- BOOTSTRAP Optional theme -->
        <!--<link rel="stylesheet" href="Files/plugins/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" crossorigin="anonymous">-->
        <!-- BOOTSTRAP Latest compiled and minified JavaScript -->
        <script src="../../Files/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>  
        <!-- BOOTSTRAP TABLE Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/bootstrap-table.min.css">
        <!-- BOOTSTRAP TABLE Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/bootstrap-table.min.js"></script>
        <!-- BOOTSTRAP TABLE  Latest compiled and minified Locales -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/locale/bootstrap-table-zh-CN.min.js"></script>

        <!-- Data Table-->
        <!--
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/s/bs-3.3.5/dt-1.10.10/datatables.min.js"></script>
        -->

        <!-- GOOGLE MAPS -->
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>    

        <link rel="stylesheet" href="../../Files/css/estilo.css">
        <script type="text/javascript">
            $(document).ready(function () {
                actualizarCantidadNuevosMensajes();
            });

            function actualizarCantidadNuevosMensajes() {
                var url_json = '../Servlet/administrarMensaje.php?accion=N_NUEVOS_MENSAJES';
                $.getJSON(
                        url_json,
                        function (datos) {
                            var visor = document.getElementById('cont-mensajes');

                            if (datos.cantidad > 0) {
                                $('#cont-mensajes').html(datos.cantidad);
                                visor.style.display = 'inline';
                            } else {
                                visor.style.display = 'none';
                            }
                        }
                );
            }
        </script>
    </head>
    <body>
        <!-- Docs master nav -->
        <header class=bs-docs-nav">
            <div class="container">
                <!-- Header-->
                <div class="row">
                    <div class="col-xs-9 logo"  >
                        <img src="../../Files/img/logo.jpg">
                    </div>
                    <!-- Social -->
                    <div class="col-xs-3 sociales">                                                
                        <a id="facebook" href=""><img src="../../Files/img/icono_facebook.png"></a>
                        <a id="twitter" href=""><img src="../../Files/img/icono_twitter.png"></a>
                        <a id="" href="../Servlet/loginOFF.php"><img src="../../Files/img/icono_salir.png" width="25px"></a>
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
                                <?php
                                if ($perfil == 1) {
                                    include '../Menus/Administrador.php';
                                } else if ($perfil == 2) {
                                    include '../Menus/Persona.php';
                                }
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>        
        <!-- Docs page layout -->
        <div class="bs-docs-container">
