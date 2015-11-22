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
                            <textarea id="especificacion"  name="especificacion" rows="9" class="form-control" aria-describedby="especificacionStatus" onKeyUp="validar('textarea', 'especificacion');"></textarea>
                            <span id="especificacionIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </section>
                    <!-- FIN Especificacion tecnica-->
                </section>
            </section>
            <!-- Seccion Nuevas Imagenes -->
            <section id="seccion-nuevas-imagenes" class="row" style="display: inline;">
                <section class="col-md-6">
                    <div id="imagenGroup" class="form-group has-feedback">
                        <label class="control-label" for="imagen">Imagenes</label>
                        <input type="file" class="form-control" id="imagen" name="imagen[]" multiple="multiple" onchange="validar('text', 'imagen')">
                        <span id="imagenIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div id="list"></div>
                    </div>
                    <div id="visor-imagenes">
                        
                    </div>
                </section>
                <section class="col-md-6">
                    <div id="planosGroup" class="form-group has-feedback">
                        <label class="control-label" for="planos">Planos</label>
                        <input type="file" class="form-control" id="planos" name="planos[]" multiple="multiple" onchange="validar('text', 'planos')">
                        <span id="planosIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div id="list"></div>
                    </div>
                    <div id="visor-planos">
                        
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

    var imagenes;
    var planos;
    function tamañoImagenes(evt) {
        imagenes = true;
        var archivos = evt.target.files;        
        for (var i = 0, f; f = archivos[i]; i++) {
            console.log("->" + f.size +' bytes');
            if(f.size <= 2000000){
                console.log(f.scr);
                $("#visor-imagenes").append(""+f.name+" : Tamaño permitido<br>");
            }else{
                $("#visor-imagenes").append(f.name+" : Tamaño no permitido<br>");
                imagenes = false;
            }
        }        
    }
    function tamañoPlanos(evt) {
        planos  = true;
        var archivos = evt.target.files;        
        for (var i = 0, f; f = archivos[i]; i++) {
            console.log("->" + f.size +' bytes');
            if(f.size <= 2000000){
                console.log(f.name+" : Tamaño permitido");                
            }else{
                console.log(f.name+" : Tamaño no permitido");
                planos = false;
            }
        }        
    }
    document.getElementById('imagen').addEventListener('change', tamañoImagenes, false);
    document.getElementById('planos').addEventListener('change', tamañoPlanos, false);
    
    function guardarModelo(evt) {
        var especificacion = getAreaText("especificacion");        
        
        /*if (validarFormulario()) {                        
         $('#fm').form('submit', {
         url: "../Servlet/administrarCasa.php?especificacion=" + especificacion,
         onSubmit: function () {
         return $(this).form('validate');
         },
         success: function (result) {
         console.log(result);
         var result = eval('(' + result + ')');
         if (result.success) {
         $('#fm').empty();
         mensaje('Exito', result.mensaje);
         location.href = "administrarModelos";
         } else {
         mensaje('Error', result.errorMsg);
         }
         }
         });
         } else {
         mensaje('Exito', "Error, falta completar algunos datos");
         }/*
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

    function validar(tipo, nombre) {
        var contenido = document.getElementById(nombre).value;
        if (tipo == 'text') {
            if (contenido != null && contenido.length > 2) {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'number') {
            if (contenido != null && contenido != "") {
                cambiarEstado(nombre, true);
            } else {
                cambiarEstado(nombre, false);
            }
        } else if (tipo == 'textarea') {
            if (getAreaText(nombre) != null && getAreaText(nombre) != "") {
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

    function validarFormulario() {
        var nombreModelo = document.getElementById('nombreModelo').value;
        var m2 = document.getElementById('m2').value;
        var dormitorio = document.getElementById('dormitorio').value;
        var banio = document.getElementById('banio').value;
        var precioKit = document.getElementById('precioKit').value;
        var precioKitPisoMadera = document.getElementById('precioKitPisoMadera').value;
        var precioKitPisoMaderaInstalado = document.getElementById('precioKitPisoMaderaInstalado').value;
        var precioKitPisoRadierInstalado = document.getElementById('precioKitPisoRadierInstalado').value;
        var especificacion = getAreaText("especificacion");
        var imagen = document.getElementById('imagen').value;
        var planos = document.getElementById('planos').value;

        var valido = true;
        if (nombreModelo == null || nombreModelo.length < 3) {
            valido = false;
            cambiarEstado("nombreModelo", false);
        }
        if (m2 == null || m2 == "" || m2 == 0) {
            valido = false;
            cambiarEstado("m2", false);
        }
        if (dormitorio == null || dormitorio == "") {
            valido = false;
            cambiarEstado("dormitorio", false);
        }
        if (banio == null || banio == "") {
            valido = false;
            cambiarEstado("banio", false);
        }
        if (precioKit == null || precioKit == "" || isNaN(precioKit)) {
            valido = false;
            cambiarEstado("precioKit", false);
        }
        if (precioKitPisoMadera == null || precioKitPisoMadera == "" || isNaN(precioKitPisoMadera)) {
            valido = false;
            cambiarEstado("precioKitPisoMadera", false);
        }
        if (precioKitPisoMaderaInstalado == null || precioKitPisoMaderaInstalado == "" || isNaN(precioKitPisoMaderaInstalado)) {
            valido = false;
            cambiarEstado("precioKitPisoMaderaInstalado", false);
        }
        if (precioKitPisoRadierInstalado == null || precioKitPisoRadierInstalado == "" || isNaN(precioKitPisoRadierInstalado)) {
            valido = false;
            cambiarEstado("precioKitPisoRadierInstalado", false);
        }
        if (especificacion == null || especificacion.length < 5) {
            valido = false;
            cambiarEstado("especificacion", false);
        }
        if (imagen == null || imagen == "") {
            valido = false;
            cambiarEstado("imagen", false);
        }
        if (planos == null || planos == "") {
            valido = false;
            cambiarEstado("planos", false)
        }
        return valido;
    }

    function getAreaText(nombre) {
        areaTexto.removeInstance(nombre);
        areaTexto = null;
        var especificacion = document.getElementById(nombre).value;
        areaTexto = new nicEditor({fullPanel: true}).panelInstance(nombre, {hasPanel: true});
        return especificacion;
    }

    function setAreaText(nombre, texto) {
        areaTexto.removeInstance(nombre);
        areaTexto = null;
        document.getElementById(nombre).value = texto;
        areaTexto = new nicEditor({fullPanel: true}).panelInstance(nombre, {hasPanel: true});
    }

</script>
<?php include 'footer.php'; ?>

