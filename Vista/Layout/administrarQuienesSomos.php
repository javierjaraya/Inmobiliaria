<?php include 'header.php'; ?>
<!-- NIC EDIT editor de texto-->
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<div class="container">
    <section class="row">
        <section class="col-md-12 tabla-principal">
            <h4>
                Nuestra Empresa
            </h4>
            <textarea id="areaTexto" name="area" rows="14" class="form-control"> </textarea>
            <button type="button" class="btn btn-success" onclick="actualizar()">Actualizar</button>
        </section>
    </section>

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
        cargarDatos();       
    });
    //]]>
    function toggleArea1() {
        if (!areaTexto) {
            areaTexto = new nicEditor({fullPanel: true}).panelInstance('areaTexto', {hasPanel: true});
        }
    }

    function actualizar() {
        areaTexto.removeInstance('areaTexto');
        areaTexto = null;
        var contenido = document.getElementById("areaTexto").value;
        guardarCambios(contenido);
        areaTexto = new nicEditor({fullPanel: true}).panelInstance('areaTexto', {hasPanel: true});
    }

    function cargarDatos() {
        var url_json = '../Servlet/administrarEmpresa.php?accion=LISTADO';
        $("#areaTexto").empty();
        $.getJSON(
                url_json,
                function (data) {
                    $('#areaTexto').html(data.quienesSomos);
                    toggleArea1();
                }
        );
    }
    
    function guardarCambios(contenido) {
        if (contenido != null && contenido != "") {
            var url_json = '../Servlet/administrarEmpresa.php?accion=ACTUALIZAR_EMPRESA&contenido=' + contenido;
            $.getJSON(
                    url_json,
                    function (result) {
                        if (result.success) {
                            mensaje('Exito', result.mensaje);
                        } else {
                            mensaje('Error', result.errorMsg);
                        }
                    }
            );
        } else {
            mensaje('Error', "Hay casillas vacias o con valores invalidos.");
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