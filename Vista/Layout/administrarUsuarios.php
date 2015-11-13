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
                            <th data-field="run">Run</th>
                            <th data-field="nombres">Nombres</th>
                            <th data-field="apellidos">Apellidos</th>
                            <th data-field="sexo">Sexo</th>
                            <th data-field="telefono">Telefono</th>
                            <th data-field="fechaNac">Fecha Nac.</th>
                            <th data-field="direccion">Direccion</th>
                            <th data-field="email">Correo</th>
                            <th data-field="clave">Clave</th>
                            <th data-field="nombrePerfil">Perfil</th>
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
    <div class="modal fade bs-example-modal-md" id="dg-modela" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <section id="panel-modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <img id="logo-modal" src="../../Files/img/logo.jpg" width="100px">
                        <label class="titulo-modal"><h4 class="modal-title" id="modalLabel"></h4></label>
                    </div>
                    <form id="fm" method="POST" >
                        <div class="modal-body">
                            <section class="row">                            
                                <section class="col-md-6">
                                    <div id="runGroup" class="form-group has-feedback">
                                        <label class="control-label" for="run">Run</label>
                                        <input type="text" class="form-control" id="run" name="run" aria-describedby="runStatus" placeholder="Run" onKeyUp="validar('run', 'run');">
                                        <span id="runIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div id="nombresGroup" class="form-group has-feedback">
                                        <label class="control-label" for="nombres">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="nombresStatus" placeholder="Nombres" onchange="validar('nombres', 'text')">
                                        <span id="nombresIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div id="apellidosGroup" class="form-group has-feedback">
                                        <label class="control-label" for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" aria-describedby="apellidosStatus" placeholder="Apellidos" onchange="validar('apellidos', 'text')">
                                        <span id="apellidosIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div id="sexoGroup" class="form-group has-feedback">
                                        <label class="control-label" for="sexo">Sexo</label>
                                        <div class="radio">
                                            <label><input type="radio" aria-describedby="sexoStatus" name="sexo" id="sexo1" value="M" onclick="validar('sexo', 'radio')">Masculino</label>
                                            <label><input type="radio" aria-describedby="sexoStatus" name="sexo" id="sexo2" value="F" onclick="validar('sexo', 'radio')">Femenino</label>
                                            <label><span id="sexoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span></label>
                                        </div>
                                    </div>
                                    <div id="telefonoGroup" class="form-group has-feedback">
                                        <label class="control-label" for="telefono">Telefono</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoStatus" placeholder="Telefono"  onchange="validar('telefono', 'tel')">
                                        <span id="telefonoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </section>
                                <section class="col-md-6">
                                    <div id="fechaNacGroup" class="form-group has-feedback">
                                        <label class="control-label" for="fechaNac">Fecha Nacimiento</label>
                                        <input type="date" class="form-control" id="fechaNac" name="fechaNac" aria-describedby="fechaNacStatus" placeholder="Fecha Nacimiento"  onchange="validar('fechaNac', 'date')">
                                        <span id="fechaNacIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div id="direccionGroup" class="form-group has-feedback">
                                        <label class="control-label" for="direccion">Direccion</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="direccion" placeholder="Direccion"  onchange="validar('direccion', 'text')">
                                        <span id="direccionIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>                                    
                                    <div id="emailGroup" class="form-group has-feedback">
                                        <label class="control-label" for="email">Correo</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Correo"  onchange="validar('email', 'email')">
                                        <span id="emailIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div id="claveGroup" class="form-group has-feedback">
                                        <label class="control-label" for="clave">Clave</label>
                                        <input type="password" class="form-control" id="clave" name="clave" aria-describedby="clave" placeholder="Clave"  onchange="validar('clave', 'text')">
                                        <span id="claveIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div id="idPerfilGroup" class="form-group">
                                        <label class="control-label" for="idPerfil">Perfil</label>
                                        <select class="form-control" id="idPerfil" name="idPerfil" aria-describedby="idPerfil" onchange="validar('idPerfil', 'select')">
                                            <option value="1">Administrador</option>
                                            <option value="2">Personal</option>
                                        </select>

                                    </div>
                                    <input type="hidden" value="" name="accion" id="accion">
                                    <input type="hidden" value="" name="runRespaldo" id="runRespaldo">
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
<!-- Administracion-->
<script src="../../files/js/validarut.js"></script>
<script type="text/javascript">
                            $(document).ready(function () {
                                cargarDatos();
                            });
                            function cargarDatos() {
                                var url_json = '../Servlet/administrarPersonas.php?accion=LISTADO';
                                $("#body-table").empty();
                                $.getJSON(
                                        url_json,
                                        function (data) {
                                            var i = 0;
                                            $.each(data, function (k, v) {
                                                var contenido = "<tr>";
                                                contenido += "<td>" + v.run + "</td>";
                                                contenido += "<td>" + v.nombres + "</td>";
                                                contenido += "<td>" + v.apellidos + "</td>";
                                                contenido += "<td>" + v.sexo + "</td>";
                                                contenido += "<td>" + v.telefono + "</td>";
                                                contenido += "<td>" + v.fechaNac + "</td>";
                                                contenido += "<td>" + v.direccion + "</td>";
                                                contenido += "<td>" + v.email + "</td>";
                                                contenido += "<td>" + v.clave + "</td>";
                                                contenido += "<td>" + v.nombrePerfil + "</td>";
                                                contenido += "<td>";
                                                contenido += "<button class='btn btn-warning btn-sm glyphicon glyphicon-pencil' onclick='editar(" + v.run + ")'></button>";
                                                contenido += "<button class='btn btn-danger btn-sm glyphicon glyphicon-trash' onclick='borrar(" + v.run + ")'></button>";
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
                                resetearFormulario();
                                $('#modalLabel').html("Agregar Usuario");
                                $('#dg-modela').modal(this)//CALL MODAL MENSAJE
                            }

                            function editar(id) {
                                document.getElementById("fm").reset();
                                document.getElementById('accion').value = "ACTUALIZAR";
                                document.getElementById('runRespaldo').value = id;
                                resetearFormulario();
                                $('#modalLabel').html("Editar Usuario");
                                $('#dg-modela').modal(this)//CALL MODAL MENSAJE
                                rellenarFormulario(id);
                            }

                            function rellenarFormulario(id) {
                                var url_json = '../Servlet/administrarPersonas.php?accion=BUSCAR_BY_ID&run=' + id;
                                $.getJSON(
                                        url_json,
                                        function (datos) {
                                            $('#fm').form('load', datos);
                                        }
                                );
                            }

                            function guardarUsuario() {
                                if (validarFormulario()) {
                                    $('#fm').form('submit', {
                                        url: "../Servlet/administrarPersonas.php",
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
                                    mensaje('Error', "Hay casillas vacias o con valores invalidos.");
                                }
                            }

                            function borrar(id) {
                                confirmacion('Confirmacion', '¿Esta seguro?, una vez eliminado no se podran recuperar los datos.');
                                document.getElementById('runEliminar').value = id;
                            }

                            function confirmarBorrar() {
                                var run = document.getElementById('runEliminar').value;
                                $.post('../Servlet/administrarPersonas.php?accion=BORRAR', {run: run}, function (result) {
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
                                var run = document.getElementById('run').value;
                                var nombres = document.getElementById('nombres').value;
                                var apellidos = document.getElementById('apellidos').value;
                                var telefono = document.getElementById('telefono').value;
                                var fechaNac = document.getElementById('fechaNac').value;
                                var direccion = document.getElementById('direccion').value;
                                var clave = document.getElementById('clave').value;
                                var email = document.getElementById('email').value;
                                var valido = true;
                                if (run == null || run.length < 6 || !Rut(run)) {
                                    valido = false;
                                    cambiarEstado("run", false);
                                }
                                if (nombres == null || nombres.length < 3) {
                                    valido = false;
                                    cambiarEstado("nombres", false);
                                }
                                if (apellidos == null || apellidos.length < 3) {
                                    valido = false;
                                    cambiarEstado("apellidos", false);
                                }
                                if (!$("#fm input[name='sexo']:radio").is(':checked')) {
                                    valido = false;
                                    cambiarEstado("sexo", false);
                                }
                                if (telefono == null || telefono.length < 6 || isNaN(telefono)) {
                                    valido = false;
                                    cambiarEstado("telefono", false);
                                }
                                if (fechaNac == null || fechaNac.length < 8) {
                                    valido = false;
                                    cambiarEstado("fechaNac", false);
                                }
                                if (direccion == null || direccion.length < 3) {
                                    valido = false;
                                    cambiarEstado("direccion", false);
                                }
                                if (clave == null || clave.length < 3) {
                                    valido = false;
                                    cambiarEstado("clave", false);
                                }
                                if (!validarEmail(email)) {
                                    valido = false;
                                    cambiarEstado("email", false);
                                }
                                return valido;
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

                            function validarEmail(email) {
                                var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                if (!expr.test(email)) {
                                    return false;
                                } else {
                                    return true;
                                }
                            }

                            function resetearFormulario() {
                                $('#runGroup').removeClass('has-error');
                                $('#runIco').removeClass('glyphicon-remove');
                                $('#runGroup').removeClass('has-success');
                                $('#runIco').removeClass('glyphicon-ok');
                                $('#nombresGroup').removeClass('has-error');
                                $('#nombresIco').removeClass('glyphicon-remove');
                                $('#nombresGroup').removeClass('has-success');
                                $('#nombresIco').removeClass('glyphicon-ok');
                                $('#apellidosGroup').removeClass('has-error');
                                $('#apellidosIco').removeClass('glyphicon-remove');
                                $('#apellidosGroup').removeClass('has-success');
                                $('#apellidosIco').removeClass('glyphicon-ok');
                                $('#sexoGroup').removeClass('has-error');
                                $('#sexoIco').removeClass('glyphicon-remove');
                                $('#sexoGroup').removeClass('has-success');
                                $('#sexoIco').removeClass('glyphicon-ok');
                                $('#telefonoGroup').removeClass('has-error');
                                $('#telefonoIco').removeClass('glyphicon-remove');
                                $('#telefonoGroup').removeClass('has-success');
                                $('#telefonoIco').removeClass('glyphicon-ok');
                                $('#fechaNacGroup').removeClass('has-error');
                                $('#fechaNacIco').removeClass('glyphicon-remove');
                                $('#fechaNacGroup').removeClass('has-success');
                                $('#fechaNacIco').removeClass('glyphicon-ok');
                                $('#direccionGroup').removeClass('has-error');
                                $('#direccionIco').removeClass('glyphicon-remove');
                                $('#direccionGroup').removeClass('has-success');
                                $('#direccionIco').removeClass('glyphicon-ok');
                                $('#claveGroup').removeClass('has-error');
                                $('#claveIco').removeClass('glyphicon-remove');
                                $('#claveGroup').removeClass('has-success');
                                $('#claveIco').removeClass('glyphicon-ok');
                                $('#emailGroup').removeClass('has-error');
                                $('#emailIco').removeClass('glyphicon-remove');
                                $('#emailGroup').removeClass('has-success');
                                $('#emailIco').removeClass('glyphicon-ok');
                                $('#idPerfilGroup').removeClass('has-error');
                                $('#idPerfilIco').removeClass('glyphicon-remove');
                                $('#idPerfilGroup').removeClass('has-success');
                                $('#idPerfilIco').removeClass('glyphicon-ok');
                            }


                            function buscarEmpleado() {
                                var nombres = document.getElementById("inputBuscarEmpleado").value;
                                var parm = "";
                                parm = parm + "&nombres=" + nombres;
                                var url_json = '../Servlet/administrarEmpleados.php?accion=BUSCAR' + parm;
                                $.getJSON(
                                        url_json,
                                        function (datos) {
                                            $('#dg').datagrid('loadData', datos);
                                        }
                                );
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

                            function eliminarCaracteres(cadena) {
                                var aux = String(cadena);
                                aux = aux.replace('.', '');
                                aux = aux.replace('.', '');
                                aux = aux.replace('-', '');
                                return aux;
                            }
</script>
<?php include 'footer.php'; ?>