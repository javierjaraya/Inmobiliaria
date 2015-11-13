<?php include 'header.php'; ?>
<div class="container">
    <section class="row">
        <section class="col-md-12 tabla-principal">
            <section class="toalbar-table">
                <button class="btn btn-success btn-sm glyphicon glyphicon glyphicon-plus" onClick="agregar()"></button>
            </section>
            <div class="table-responsive">
                <table id="tabla" class="table table-hover table table-striped table-bordered bootstrap-datatable dataTable" data-toggle="table"><!-- data-url="../Servlet/administrarUsuario.php?accion=LISTADO"> -->
                    <thead>
                        <tr>
                            <th data-field="run">Run</th>
                            <th data-field="nombres">Nombres</th>
                            <th data-field="apellidos">Apellidos</th>
                            <th data-field="sexo">Sexo</th>
                            <th data-field="telefono">Telefono</th>
                            <th data-field="fechaNac">Fecha Nac.</th>
                            <th data-field="direccion">Direccion</th>
                            <th data-field="clave">Clave</th>
                            <th data-field="idPerfil">ID Perfil</th>
                            <th data-field="nombrePerfil">Perfil</th>
                            <th data-field="accion">Accion</th>
                        </tr>
                    </thead>
                    <tbody id="body-table">

                    </tbody>
                </table>
            </div>
        </section>
    </section>

    <!--VENTA DIALOGO :  -->    
    <!-- MODAL MENSAJE-->
    <div class="modal fade bs-example-modal-md" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <section id="panel-modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <img id="logo-mensaje" src="../../Files/img/logo.jpg" width="100px">
                        <label class="titulo-modal"><h4 class="modal-title" id="modalLabel"></h4></label>
                    </div>
                    <form method="POST" >
                        <div class="modal-body">
                            <section class="row">                            
                                <section class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputRun">Run</label>
                                        <input type="text" class="form-control" id="inputRun" placeholder="Run">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNombres">Nombres</label>
                                        <input type="text" class="form-control" id="inputNombres" placeholder="Nombres">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputApellidos">Apellidos</label>
                                        <input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSexo">Sexo</label>
                                        <input type="text" class="form-control" id="inputSexo" placeholder="Sexo">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTelefono">Telefono</label>
                                        <input type="tel" class="form-control" id="inputTelefono" placeholder="Telefono">
                                    </div>
                                </section>
                                <section class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputFechaNacimiento">Fecha Nacimiento</label>
                                        <input type="date" class="form-control" id="inputFechaNacimiento" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDireccion">Direccion</label>
                                        <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClave">Clave</label>
                                        <input type="text" class="form-control" id="inputClave" placeholder="Clave">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputIdPerfil">Perfil</label>
                                        <input type="text" class="form-control" id="inputIdPerfil" placeholder="">
                                    </div>
                                </section>                           
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div><!-- END MODAL MENSAJE-->
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
                                    $.each(data, function (k, v) {
                                        var contenido = "<tr>";
                                        contenido += "<td>" + v.run + "</td>";
                                        contenido += "<td>" + v.nombres + "</td>";
                                        contenido += "<td>" + v.apellidos + "</td>";
                                        contenido += "<td>" + v.sexo + "</td>";
                                        contenido += "<td>" + v.telefono + "</td>";
                                        contenido += "<td>" + v.fechaNac + "</td>";
                                        contenido += "<td>" + v.direccion + "</td>";
                                        contenido += "<td>" + v.clave + "</td>";
                                        contenido += "<td>" + v.idPerfil + "</td>";
                                        contenido += "<td>" + v.nombrePerfil + "</td>";
                                        contenido += "<td>";
                                        contenido += "<button class='btn btn-warning btn-sm glyphicon glyphicon-pencil'></button>";
                                        contenido += "<button class='btn btn-danger btn-sm glyphicon glyphicon-trash'></button>";
                                        contenido += "</td>";
                                        contenido += "</tr>";
                                        $("#body-table").append(contenido);
                                    });
                                }
                        );
                    }

                    function agregar() {
                        $('#modalLabel').html("Agregar Usuario");
                        $('#mensaje').modal(this)//CALL MODAL MENSAJE
                    }
                    
                    function editar(id) {
                        document.getElementById("fm").reset();
                        var row = $('#dg').datagrid('getSelected');
                        if (row) {
                            $('#dlg').dialog('open').dialog('setTitle', 'Editar Empleado');
                            $('#runRespaldo').val(row.run);
                            $('#idPerfil').val(row.idPerfil);
                            $('#fm').form('load', row);
                            obtieneUsuario();
                            document.getElementById('accion').value = "ACTUALIZAR";
                        } else {
                            $.messager.alert('Alerta', 'Debe seleccionar un empleado a editar.');
                        }
                    }

                    function guardarEmpleado() {
                        if (validar()) {
                            $('#fm').form('submit', {
                                url: "../Servlet/administrarEmpleados.php",
                                onSubmit: function () {
                                    return $(this).form('validate');
                                },
                                success: function (result) {
                                    var result = eval('(' + result + ')');
                                    if (result.errorMsg) {
                                        $.messager.alert('Error', result.errorMsg);
                                    } else {
                                        $('#dlg').dialog('close');        // close the dialog
                                        $('#dg').datagrid('reload');    // reload the user data
                                        $.messager.show({
                                            title: 'Aviso',
                                            msg: result.mensaje
                                        });
                                    }
                                }
                            });
                        }

                    }
                    function eliminarEmpleado() {
                        var row = $('#dg').datagrid('getSelected');
                        if (row) {
                            $.messager.confirm('Confirmar', '¿Esta seguro de eliminar el empleado seleccionado?', function (r) {
                                if (r) {//SI
                                    $.post('../Servlet/administrarEmpleados.php?accion=BORRAR', {run: row.run}, function (result) {
                                        if (result.success) {
                                            $('#dg').datagrid('reload');    // reload the user data
                                            $.messager.show({
                                                title: 'Aviso',
                                                msg: result.mensaje
                                            });
                                        } else {
                                            $.messager.show({// show error message
                                                title: 'Error',
                                                msg: result.errorMsg
                                            });
                                        }
                                    }, 'json');
                                }
                            });
                        } else {
                            $.messager.alert('Alerta', 'Debe seleccionar un empleado a eliminar.');
                        }
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

                    function eliminarCaracteres(cadena) {
                        var aux = String(cadena);
                        aux = aux.replace('.', '');
                        aux = aux.replace('.', '');
                        aux = aux.replace('-', '');
                        return aux;
                    }
</script>
<?php include 'footer.php'; ?>