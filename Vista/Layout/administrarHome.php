<?php include 'header.php'; ?>
<div class="container">
    <section class="row">
        <section class="col-md-12 tabla-principal">
            <section class="toalbar-table">
                <button class="btn btn-success btn-sm glyphicon glyphicon glyphicon-plus" onClick="agregar()"></button>
            </section>
            <div class="table-responsive">
                <table id="tabla" name="table" class="table table-hover table table-striped table-bordered bootstrap-datatable dataTable" data-toggle="table"><!-- data-url="../Servlet/administrarUsuario.php?accion=LISTADO"> -->
                    <thead>
                        <tr>
                            <th data-field="idBanner">ID</th>
                            <th data-field="nombre">Miniatura</th>
                            <th data-field="ruta">Nombre</th>
                            <th data-field="vista">Ruta</th>
                            <th data-field="accion">Accion</th>
                        </tr>
                    </thead>
                    <tbody id="body-table" name="body-table">

                    </tbody>
                </table>
            </div>
        </section>
    </section>

    <!-- DIALOGO MODAL-->
    <div class="modal fade bs-example-modal-sm" id="dg-modela" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <section id="panel-modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <img id="logo-modal" src="../../Files/img/logo.jpg" width="100px">
                        <label class="titulo-modal"><h4 class="modal-title" id="modalLabel"></h4></label>
                    </div>
                    <form id="fm" enctype="multipart/form-data" method="post" >
                        <div class="modal-body">
                            <section class="row">                            
                                <section class="col-md-12">
                                    <div id="imagenGroup" class="form-group has-feedback">
                                        <label class="control-label" for="imagen">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen" multiple="">                                                                                
                                        <span id="imagenIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div id="list"></div>

                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Tamaño:</label>
                                        <div id="detalle-imagen"></div>
                                    </div>
                                    <input type="hidden" value="" name="accion" id="accion">
                                    <input type="hidden" value="" name="tamaño" id="tamaño">
                                    <input type="hidden" value="" name="idImagen" id="idImagen">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                </section>                         
                            </section><!-- Fin Row-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" onclick="guardarUsuario()">Agregar</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div><!-- END DIALOGO MODAL-->

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

    <!-- MODAL CONFIRMACION-->
    <div class="modal fade bs-example-modal-sm" id="dg-confirmacion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <section id="panel-modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <img id="logo-confirmacion" src="../../Files/img/logo.jpg" width="30px">
                        <label class="titulo-modal"><h4 class="modal-title" id="titulo-mensaje"></h4></label>
                    </div>
                    <div class="modal-body">
                        <section class="row">
                            <section class="col-md-12">
                                <div id="contenedor-confirmacion">

                                </div>
                            </section>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="confirmarBorrar()">Borrar</button>
                        <input type="hidden" value="" id="runEliminar" name="runEliminar">
                    </div>
                </section>
            </div>
        </div>
    </div><!-- END MODAL CONFIRMACION-->
</div>
<?php include 'footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function () {
        cargarDatos();
    });

    $(document).ready(function () {
        // Verificamos el sopor te de la API de Archivos, es necesario que soporte las 4 funciones.
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            function handleFileSelect(evt) {
                var files = evt.target.files; // Objeto para Lista de Archivos, en el objeto existen los datos del archivo
                var tamaño = 0;
                var output = [];//Creamos un arreglo para guardar todos los archivos datos en diferentes posiciones.
                for (var i = 0, f; f = files[i]; i++) {//Recorremos el objeto files para obtener los datos de cada archivo y guardarlos en el arreglo.
                    var aux = "" + (f.size / 1024) / 1024
                    var separado = aux.split(".");
                    tamaño = separado[0] + "." + separado[1].substring(0, 2);

                    output.push('<strong>', f.name, '</strong>  - ', tamaño, ' Mb');
                }
                if (tamaño > 2) {
                    cambiarEstado("imagen", false);
                }
                document.getElementById('tamaño').value = tamaño;
                document.getElementById('detalle-imagen').innerHTML = output.join('');//Introducimos la lista de archivos entre las etiquetas <ul></ul>
            }
            document.getElementById('imagen').addEventListener('change', handleFileSelect, false);//Ponemos un listener para escuchar cuando el evento Change del input file se ejecute, quiere decir cuando se de click en "Abrir"
        } else {
            mensaje('Aviso', 'Tu navegador no tiene soporte para algunas funciones.');
        }
    });

    function cargarDatos() {
        var url_json = '../Servlet/administrarBanner.php?accion=LISTADO';
        $("#body-table").empty();
        $.getJSON(
                url_json,
                function (data) {
                    var i = 0;
                    $.each(data, function (k, v) {
                        var contenido = "<tr>";
                        contenido += "<td>" + v.idImagen + "</td>";
                        contenido += "<td width='100px'><img src='../../" + v.ruta + "' width='90px'></td>";
                        contenido += "<td>" + v.nombre + "</td>";
                        contenido += "<td>" + v.ruta + "</td>";
                        contenido += "<td width='60px'>";
                        contenido += "<button class='btn btn-danger btn-sm glyphicon glyphicon-trash' onclick='borrar(" + v.idImagen + ")'></button>";
                        contenido += "</td>";
                        contenido += "</tr>";
                        $("#body-table").append(contenido);
                        i++;
                    });
                }
        );
    }

    function agregar() {
        document.getElementById("fm").reset();
        document.getElementById('accion').value = "AGREGAR";
        document.getElementById('detalle-imagen').innerHTML = "";
        resetearFormulario();
        $('#modalLabel').html("Agregar Imagen");
        $('#dg-modela').modal(this)//CALL MODAL MENSAJE
    }

    function guardarUsuario() {
        if (validarFormulario()) {
            $('#fm').form('submit', {
                url: "../Servlet/administrarBanner.php",
                onSubmit: function () {
                    return $(this).form('validate');
                },
                success: function (result) {
                    var result = eval('(' + result + ')');
                    if (result.success) {
                        $('#dg-modela').modal('toggle'); //Cerrar Modal
                        cargarDatos(); //Refrescamos la tabla
                        mensaje('Exito', result.mensaje);
                    } else {
                        mensaje('Error', result.errorMsg);
                    }
                }
            });
        } else {
            mensaje('Aviso', "Sebe seleccionar una imagen que no supere los 2 Mb.");
        }
    }

    function borrar(id) {
        confirmacion('Confirmacion', '¿Esta seguro?, una vez eliminado no se podran recuperar los datos.');
        document.getElementById('idImagen').value = id;
    }

    function confirmarBorrar() {
        var idImagen = document.getElementById('idImagen').value;
        $.post('../Servlet/administrarBanner.php?accion=BORRAR', {idImagen: idImagen}, function (result) {
            if (result.success) {
                $('#dg-confirmacion').modal('toggle'); //Cerrar Modal
                cargarDatos(); //Refrescamos la tabla
                mensaje('Exito', result.mensaje);
            } else {
                mensaje('Error', result.errorMsg);
            }
        }, 'json');
    }
    function validarFormulario() {
        var tamaño = document.getElementById('tamaño').value;
        var valido = true;
        if (tamaño == null || tamaño == "" || tamaño > 2) {
            valido = false;
        }
        return valido;
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
    function resetearFormulario() {
        $('#imagenGroup').removeClass('has-error');
        $('#imagenIco').removeClass('glyphicon-remove');
        $('#imagenGroup').removeClass('has-success');
        $('#imagenIco').removeClass('glyphicon-ok');
    }

    function mensaje(titulo, mensaje) {
        document.getElementById('logo-mensaje').src = "../../Files/img/iconoInformacion.png";
        $('#titulo-mensaje').html(titulo);
        $('#contenedor-mensaje').html(mensaje);
        $('#dg-mensaje').modal(this)//CALL MODAL MENSAJE
    }

    function confirmacion(titulo, mensaje) {
        document.getElementById('logo-confirmacion').src = "../../Files/img/iconoInformacion.png";
        $('#titulo-confirmacion').html(titulo);
        $('#contenedor-confirmacion').html(mensaje);
        $('#dg-confirmacion').modal(this)//CALL MODAL MENSAJE
    }
</script>