<?php include 'header.php'; ?>



<!-- Administracion-->
<script src="../../files/js/validarut.js"></script>

<script>
        function crearEmpleado() {
            document.getElementById("fm").reset();
            run.disabled = false;//Activamos
            $('#dlg').dialog('open').dialog('setTitle', 'Crear Persona');
            document.getElementById('accion').value = "AGREGAR";
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

        function editarEmpleado() {
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

        function eliminarCaracteres(cadena) {
            var aux = String(cadena);
            aux = aux.replace('.', '');
            aux = aux.replace('.', '');
            aux = aux.replace('-', '');
            return aux;
        }
</script>
<?php include 'footer.php'; ?>