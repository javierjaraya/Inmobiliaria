</div>
<!-- Footer-->
<footer class="bs-docs-footer" id="contenedor-footer"style="background-color: #292929; color: #FFF;">
    <div class="container footer" >
        <div class="row">
            <div class="col-md-2 columna-footer">
                <ul>
                    <li> <!--class='active'--><a href='index.php'>Inicio</a></li>
                    <li><a href='modelos.php'>Modelos</a></li>
                    <li><a href='quienesSomos.php'>Quienes Somos</a></li>
                    <li><a href='contactanos.php'>Contactanos</a></li>
                </ul>
            </div>
            <div class="col-md-4 columna-footer">
                <ul>
                    <li>CONTACTO POSVENTA SANTIAGO</li>
                    <li><a href='mailto:servicioalcliente@santarosacontructora.cl'>servicioalcliente@santarosacontructora.cl</a></li>
                    <li>CONTACTO POSVENTA SUR</li>
                    <li><a href='mailto:posventasur@santarosacontructora.cl'>posventasur@santarosacontructora.cl</a></li>                            
                </ul>
            </div>
            <div class="col-md-3 columna-footer">
                <ul>
                    <li><a href='#'>Santa Rosa Constructora</a></li>
                    <li><a href='#' data-toggle="modal" data-target="#login">Ingresar al Sistema</a></li>
                </ul>
            </div>
            <div class="col-md-3 columna-footer">
                <ul>
                    <li><a href='http://www.icibiobio.cl'>ICI BIOBIO</a></li>
                    <li>@ 2015 ICI BioBio</li>
                    <li>Javier Jara Yañez</li>
                    <li><a href='mailto:javierjara@icibiobio.cl'>javierjara@icibiobio.cl</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- JQUERY FOR LOGIN-->
<script type="text/javascript" src="Files/plugins/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
<!-- Modal Login-->
<div class="modal fade bs-example-modal-sm" id="login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <section id="panel-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img src="Files/img/logo.jpg" width="120px">
                </div>
                <div class="modal-body">
                    <section class="row">
                        <section class="col-md-12">
                            <form id="fm-login" method="post" novalidate>
                                <div class="form-group">
                                    <label for="InputRut">Run:</label>
                                    <input type="text" class="form-control" id="InputRun" name="InputRun" placeholder="112223339 ">
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword1">Password</label>
                                    <input type="password" class="form-control" id="InputPassword1" name="InputPassword1" placeholder="Password">
                                </div>
                                <div class="boton-login">
                                    <a class="btn btn-default" onclick="validarLogin()">Entrar</a>
                                </div>   
                            </form>
                        </section>
                    </section>
                </div>
            </section>
        </div>
    </div>
</div><!-- END MODAL LOGIN-->
<!-- MODAL MENSAJE-->
<div class="modal fade bs-example-modal-sm" id="dg-mensaje" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <section id="panel-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img id="logo-mensaje" src="Files/img/logo.jpg" width="30px">
                    <label class="titulo-modal"><h4 class="modal-title" id="titulo-mensaje"></h4></label>
                </div>
                <div class="modal-body">
                    <section class="row">
                        <section class="col-md-12">
                            <div id="contenedor-mensaje">
                                
                            </div>
                        </section>
                    </section>
                </div>
            </section>
        </div>
    </div>
</div><!-- END MODAL MENSAJE-->
<script type="text/javascript">
    function validarLogin() {
        $('#fm-login').form('submit', {
            url: "Vista/Servlet/login.php",
            onSubmit: function () {
                return $(this).form('validate');
            },
            success: function (result) {
                var result = eval('(' + result + ')');                
                if (!result.success) { //
                    document.getElementById('logo-mensaje').src = "Files/img/iconoInformacion.png";
                    $('#contenedor-mensaje').html(result.mensaje);
                    $('#dg-mensaje').modal(this)//CALL MODAL MENSAJE
                } else {
                    location.href = result.pagina;
                }
            }
        });
    }
</script>
</body>
</html>