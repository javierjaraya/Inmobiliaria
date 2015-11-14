<?php include 'header.php'; ?>
<div class="container">
    <section class="row">
        <section class="col-md-12 tabla-principal">
            <section class="col-md-6"> 
                <h3>Mensajes</h3>
                <div class="table-responsive">
                    <table id="tabla" name="table" class="table table-hover table table-striped table-bordered bootstrap-datatable dataTable" data-toggle="table">
                        <thead>
                            <tr>
                                <th data-field="fecha">Fecha</th>
                                <th data-field="mensaje">Asunto</th>
                                <th data-field="accion">Accion</th>
                            </tr>
                        </thead>
                        <tbody id="body-table" name="body-table">

                        </tbody>
                    </table>
                </div>
            </section>
            <section class="col-md-6">
                <section id="visor-mensaje" name="visor-mensaje" style="display: none;">
                    <section class="toolbar-visor">
                        <button class="btn btn-default btn-sm glyphicon glyphicon-arrow-left" onClick="cerrarVisor()"></button>
                        <label id="fecha-visor"></label>
                        <button class='btn btn-default btn-sm glyphicon glyphicon-trash' onclick='borrarVisor()'></button>
                    </section>
                    <form id="fm-visor" method="GET">
                        <section class="header-visor">
                            <label><h4 id="asunto-visor"></h4></label>
                            <div id="nombresGroup" class="form-group has-feedback">
                                <label>Nombre:</label><input type="text" class="form-control" id="nombre" name="nombre" value="">
                                <label>Correo:</label><input type="email" class="form-control" id="email" name="email" value="">
                                <label>Fono:</label><input type="tel" class="form-control" id="fono" name="fono" value="">
                            </div>
                        </section>
                        <section class="body-visor" id="texto-mensaje">

                        </section>
                        <input type="hidden" name="idMensaje" id="idMensaje" value="">
                    </form>
                </section>
            </section>
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


<!-- Administracion-->
<script src="../../files/js/validarut.js"></script>

<script type="text/javascript">
                            $(document).ready(function () {
                                cargarDatos();
                            });

                            function cargarDatos() {
                                var url_json = '../Servlet/administrarMensaje.php?accion=LISTADO';
                                $("#body-table").empty();
                                $.getJSON(
                                        url_json,
                                        function (data) {
                                            var i = 0;
                                            $.each(data, function (k, v) {
                                                var visto = ""
                                                if (v.visto == 0) {
                                                    visto = "success";
                                                }

                                                var contenido = "<tr class='" + visto + "' id='tr-" + v.idMensaje + "'>";
                                                contenido += "<td>" + v.fecha + "</td>";
                                                contenido += "<td>" + v.asunto + "</td>";
                                                contenido += "<td>";
                                                contenido += "<button class='btn btn-default btn-sm glyphicon glyphicon-envelope' onclick='ver(" + v.idMensaje + ")'></button>";
                                                contenido += "<button class='btn btn-default btn-sm glyphicon glyphicon-trash' onclick='borrar(" + v.idMensaje + ")'></button>";
                                                contenido += "</td>";
                                                contenido += "</tr>";
                                                $("#body-table").append(contenido);
                                                i++;
                                            });
                                        }
                                );
                            }

                            function ver(id) {
                                document.getElementById("fm-visor").reset();
                                var url_json = '../Servlet/administrarMensaje.php?accion=BUSCAR_BY_ID&idMensaje=' + id;
                                $.getJSON(
                                        url_json,
                                        function (datos) {
                                            $('#fm-visor').form('load', datos);
                                            $('#asunto-visor').html(datos.asunto);
                                            $('#fecha-visor').html("Fecha: " + datos.fecha);
                                            $('#texto-mensaje').html(datos.mensaje);
                                        }
                                );
                                marcarVisto(id);
                                var visor = document.getElementById('visor-mensaje');
                                visor.style.display = 'block';
                                actualizarCantidadNuevosMensajes();
                            }

                            function marcarVisto(id) {
                                $('#tr-' + id).removeClass('success');
                                var url_json = '../Servlet/administrarMensaje.php?accion=MARCAR_VISTO&idMensaje=' + id;
                                $.getJSON(
                                        url_json,
                                        function (datos) {
                                            //sin accion
                                        }
                                );
                            }

                            function borrar(id) {
                                confirmacion('Confirmacion', '¿Esta seguro?, una vez eliminado no se podran recuperar los datos.');
                                document.getElementById('idMensaje').value = id;
                            }
                            
                            function borrarVisor() {
                                confirmacion('Confirmacion', '¿Esta seguro?, una vez eliminado no se podran recuperar los datos.');                                
                            }

                            function confirmarBorrar() {
                                var idMensaje = document.getElementById('idMensaje').value;
                                $.post('../Servlet/administrarMensaje.php?accion=BORRAR', {idMensaje: idMensaje}, function (result) {
                                    if (result.success) {
                                        $('#dg-confirmacion').modal('toggle'); //Cerrar Modal
                                        cargarDatos(); //Refrescamos la tabla
                                        cerrarVisor();
                                        mensaje('Exito', result.mensaje);                                        
                                    } else {
                                        mensaje('Error', result.errorMsg);
                                    }
                                }, 'json');
                            }

                            function cerrarVisor() {
                                var visor = document.getElementById('visor-mensaje');
                                visor.style.display = 'none';
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
<?php include 'footer.php'; ?>