<?php include 'header.php'; ?>
<?php

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion == "MODIFICAR") {
    $idCasa = htmlspecialchars($_REQUEST['idCasa']);
    echo "<input type='hidden' id='idCasaRecibida' name='idCasaRecibida' value='" . $idCasa . "'>";
}
echo "<input type='hidden' id='accionRecibida' name='accionRecibida' value='" . $accion . "'>";
?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<div class="container"> 
    <form id="fm" method="POST" enctype="multipart/form-data">
        <div class="tabla-principal">        
            <section class="row">
                <section class="toalbar-table" style="padding-left: 35px;">
                    <button type="button" class="btn btn-success btn-sm" onclick="guardarModelo()">Publicar</button>
                </section>
                <section class="col-md-12">
                    <!-- Detalle modelo-->
                    <section class="col-md-3">                    
                        <div id="nombreModeloGroup" class="form-group has-feedback">
                            <label class="control-label" for="nombreModelo">Nombre modelo</label>
                            <input type="text" class="form-control" id="nombreModelo" name="nombreModelo" aria-describedby="nombreModeloStatus" placeholder="Nombre modelo de la casa" onKeyUp="validar('text', 'nombreModelo');">
                            <span id="nombreModeloIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div id="m2Group" class="form-group has-feedback">
                            <label class="control-label" for="m2">Metros Cuadrados</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="m2" name="m2" aria-describedby="m2Status" min="0" placeholder="Sin decimales" onKeyUp="validar('number', 'm2');">
                                <div class="input-group-addon">m2</div>
                            </div>
                            <span id="m2Ico" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div id="dormitorioGroup" class="form-group has-feedback">
                            <label class="control-label" for="dormitorio">Dormitorios</label>
                            <input type="number" class="form-control" id="dormitorio" name="dormitorio" aria-describedby="dormitorioStatus" min="0" placeholder="Sin decimales" onKeyUp="validar('number', 'dormitorio');">
                            <span id="dormitorioIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div id="banioGroup" class="form-group has-feedback">
                            <label class="control-label" for="banio">Baños</label>
                            <input type="number" class="form-control" id="banio" name="banio" aria-describedby="banioStatus" min="0" placeholder="Sin decimales" onKeyUp="validar('number', 'banio');">
                            <span id="banioIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>                    
                    </section>
                    <section class="col-md-3">
                        <div id="precioKitGroup" class="form-group has-feedback">
                            <label class="control-label" for="precioKit">Precio Kit</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" class="form-control" id="precioKit" name="precioKit" aria-describedby="precioKitStatus" min="0" placeholder="Sin punto y coma" onKeyUp="validar('number', 'precioKit');">
                            </div>
                            <span id="precioKitIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div id="precioKitPisoMaderaGroup" class="form-group has-feedback">
                            <label class="control-label" for="precioKitPisoMadera">Kit Piso Madera</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" class="form-control" id="precioKitPisoMadera" name="precioKitPisoMadera" aria-describedby="precioKitPisoMaderaStatus" min="0" placeholder="Sin punto y coma" onKeyUp="validar('number', 'precioKitPisoMadera');">
                            </div>
                            <span id="precioKitPisoMaderaIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div id="precioKitPisoMaderaInstaladoGroup" class="form-group has-feedback">                        
                            <label class="control-label" for="precioKitPisoMaderaInstalado">Kit Piso Madera Instalado</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" class="form-control" id="precioKitPisoMaderaInstalado" name="precioKitPisoMaderaInstalado" aria-describedby="precioKitPisoMaderaInstaladoStatus" min="0" placeholder="Sin punto y coma" onKeyUp="validar('number', 'precioKitPisoMaderaInstalado');">
                            </div>
                            <span id="precioKitPisoMaderaInstaladoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>                        
                        </div>
                        <div id="precioKitPisoRadierInstaladoGroup" class="form-group has-feedback">
                            <label class="control-label" for="precioKitPisoRadierInstalado">Kit Piso Radier Instalado</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" class="form-control" id="precioKitPisoRadierInstalado" name="precioKitPisoRadierInstalado" aria-describedby="precioKitPisoRadierInstaladoStatus" min="0" placeholder="Sin punto y coma" onKeyUp="validar('number', 'precioKitPisoRadierInstalado');">
                            </div>
                            <span id="precioKitPisoRadierInstaladoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </section>
                    <!-- FIN detalle modelo-->
                    <!-- Especificacion tecnica-->
                    <section class="col-md-6">
                        <div id="especificacionGroup" class="form-group has-feedback">
                            <label class="control-label" for="especificacion">Especificacion tecnica</label>
                            <textarea id="especificacion" name="especificacion" rows="14" class="form-control"> </textarea>
                        </div>
                    </section>
                    <!-- FIN Especificacion tecnica-->
                </section>
            </section>
            <!-- Seccion Nuevas Imagenes -->
            <section id="seccion-nuevas-imagenes" class="row" style="display: inline;">
                <section class="col-md-6">
                    <div id="imagenesGroup" class="form-group has-feedback">
                        <label class="control-label" for="imagen">Imagenes</label>
                        <input type="file" class="form-control" id="imagen" name="imagen[]" multiple="multiple">
                        <span id="imagenIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div id="list"></div>
                    </div>
                </section>
                <section class="col-md-6">
                    <div id="planosGroup" class="form-group has-feedback">
                        <label class="control-label" for="planos">Planos</label>
                        <input type="file" class="form-control" id="planos" name="planos[]" multiple="multiple">                                                                                
                        <span id="planosIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div id="list"></div>
                    </div>
                </section>
            </section>
            <!-- FIN Seccion Nuevas Imagenes -->
            <!-- Seccion edicion imagenes-->
            <section id="seccion-imagenes" class="row" style="display: none;">
                <!-- Tabla imagenes-->
                <section class="col-md-6">
                    <section class="toalbar-table">
                        <label class="control-label" for="imagenes">Imagenes</label>
                        <button class="btn btn-success btn-sm glyphicon glyphicon glyphicon-plus" onClick="agregarImagen()"></button>
                    </section>
                    <div class="table-responsive">
                        <table id="tabla-imagen" name="table-imagen" class="table table-hover table table-striped table-bordered bootstrap-datatable dataTable" data-toggle="table-imagen">
                            <thead>
                                <tr>
                                    <th data-field="miniatura">Miniatura</th>
                                    <th data-field="nombre">Nombre</th>                                
                                    <th data-field="tamaño">Tamaño</th>
                                    <th data-field="accion">Accion</th>
                                </tr>
                            </thead>
                            <tbody id="body-table-imagen" name="body-table-imagen">

                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- FIN Tabla imagenes-->
                <!-- Tabla Planos-->
                <section class="col-md-6">
                    <section class="toalbar-table">
                        <label class="control-label" for="planos">Planos</label>
                        <button class="btn btn-success btn-sm glyphicon glyphicon glyphicon-plus" onClick="agregarPlanos()"></button>
                    </section>
                    <div class="table-responsive">
                        <table id="tabla-planos" name="table-planos" class="table table-hover table table-striped table-bordered bootstrap-datatable dataTable" data-toggle="table-planos">
                            <thead>
                                <tr>
                                    <th data-field="miniatura">Miniatura</th>
                                    <th data-field="nombre">Nombre</th>                                
                                    <th data-field="tamaño">Tamaño</th>
                                    <th data-field="accion">Accion</th>
                                </tr>
                            </thead>
                            <tbody id="body-table-planos" name="body-table-planos">

                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- FIN Tabla planos-->
            </section>
            <!-- FIN Seccion edicion imagenes-->
        </div>        
        <input type="hidden" id="accion" name="accion">
        <input type="hidden" id="idCasa" name="idCasa">
    </form>
    
    <!-- MODAL MENSAJE-->
    <div class="modal fade bs-example-modal-sm" id="dg-mensaje" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <section id="panel-modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <img id="logo-mensaje" src="../../Files/img/logo.jpg" width="30px">
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
</div>   
<script type="text/javascript">
    var areaTexto;
    //<![CDATA[
    bkLib.onDomLoaded(function () {
        toggleArea1();
    });
    ////]]>
    function toggleArea1() {
        if (!areaTexto) {
            areaTexto = new nicEditor().panelInstance('especificacion', {hasPanel: true});
        }
    }

    $(document).ready(function () {
        var accion = document.getElementById('accionRecibida').value;
        document.getElementById('accion').value = accion;
    });

    function guardarModelo() {
        areaTexto.removeInstance('especificacion');
        areaTexto = null;
        var especificacion = document.getElementById("especificacion").value;
        areaTexto = new nicEditor({fullPanel: true}).panelInstance('especificacion', {hasPanel: true});


        $('#fm').form('submit', {
            url: "../Servlet/administrarCasa.php?especificacion=" + especificacion,
            onSubmit: function () {
                return $(this).form('validate');
            },
            success: function (result) {                
                var result = eval('(' + result + ')');
                if (result.success) {
                    $('#fm').empty();
                    mensaje('Exito', result.mensaje);
                    location.href="administrarModelos";
                } else {
                    mensaje('Error', result.errorMsg);
                }
            }
        });
    }
    function cargarDatos() {
        /*
         var url_json = '../Servlet/administrarEmpresa.php?accion=LISTADO';
         $("#areaTexto").empty();
         $.getJSON(
         url_json,
         function (data) {
         $('#areaTexto').html(data.quienesSomos);
         
         }
         );
         */
    }

    function validar(nombre, tipo) {
        var contenido;
        if (tipo == 'run') {
            contenido = eliminarCaracteres(document.getElementById(nombre).value);
            document.getElementById(nombre).value = contenido;
            if (contenido != null && contenido.length > 6 && Rut(contenido)) {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'text') {
            contenido = document.getElementById(nombre).value;
            if (contenido != null && contenido.length > 2) {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'radio') {
            if ($("#fm input[name='" + nombre + "']:radio").is(':checked')) {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'tel') {
            contenido = document.getElementById(nombre).value;
            if (contenido != null && contenido.length > 5 && !isNaN(contenido)) {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'date') {
            contenido = document.getElementById(nombre).value;
            if (contenido != null && contenido.length > 6) {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'email') {
            contenido = document.getElementById(nombre).value;
            if (validarEmail(contenido)) {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'select') {
            contenido = document.getElementById(nombre).value;
            if (contenido != null && contenido != "") {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'number') {
            contenido = document.getElementById(nombre).value;
            if (contenido != null && contenido != "") {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        }
    }

    function cambiarEstado(nombre, estado) {
        if (estado) {
            $('#' + nombre + 'Group').removeClass('has-error');
            $('#' + nombre + 'Ico').removeClass('glyphicon-remove');
            $('#' + nombre + 'Group').addClass('has-success');
            $('#' + nombre + 'Ico').addClass('glyphicon-ok');
        } else {
            $('#' + nombre + 'Group').removeClass('has-success');
            $('#' + nombre + 'Ico').removeClass('glyphicon-ok');
            $('#' + nombre + 'Group').addClass('has-error');
            $('#' + nombre + 'Ico').addClass('glyphicon-remove');
        }
    }

    function mensaje(titulo, mensaje) {
        document.getElementById('logo-mensaje').src = "../../Files/img/iconoInformacion.png";
        $('#titulo-mensaje').html(titulo);
        $('#contenedor-mensaje').html(mensaje);
        $('#dg-mensaje').modal(this)//CALL MODAL MENSAJE
    }

</script>
<?php include 'footer.php'; ?>

