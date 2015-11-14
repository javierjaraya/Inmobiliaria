<?php include 'header.php'; ?>
<div class="container">
    <section class="row">
        <section class="col-md-6 tabla-principal">
            <section class="formulario-contacto">
                <form id="fm" method="POST">
                    <div id="direccionGroup" class="form-group has-feedback">
                        <label class="control-label" for="direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="direccionStatus" placeholder="Direccion" onchange="validar('direccion', 'text')">
                        <span id="direccionIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div id="telefonoGroup" class="form-group has-feedback">
                        <label class="control-label" for="telefono">Telefono:</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoStatus" placeholder="Telefono" onchange="validar('telefono', 'tel')">
                        <span id="telefonoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div id="descripcionUbicacionGroup" class="form-group has-feedback">
                        <label class="control-label" for="descripcionUbicacion">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcionUbicacion" name="descripcionUbicacion" aria-describedby="descripcionUbicacionStatus" placeholder="Descripcion" onchange="validar('descripcionUbicacion', 'text')">
                        <span id="descripcionUbicacionIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div  class="form-group">
                        <label class="control-label" for="latitud">Latitud:</label>
                        <input type="text" class="form-control" id="latitud" name="latitud"  placeholder="Latitud">                        
                    </div>
                    <div  class="form-group">
                        <label class="control-label" for="longitud">Longitud:</label>
                        <input type="text" class="form-control" id="longitud" name="longitud"  placeholder="Longitud">                        
                    </div>
                    <div  class="form-group">
                        <label class="control-label" for="zoom">Zoom:</label>
                        <input type="number" class="form-control" id="zoom" name="zoom" min="1" max="18" onchange="refrescarMapa()">                        
                    </div>
                    <button type="button" class="btn btn-default" onclick="actualizar()">Actualizar</button>
                    <input type="hidden" value="ACTUALIZAR_CONTACTO" name="accion" id="accion">
                    <input type="hidden" value="" name="idEmpresa" id="idEmpresa">
                </form>
            </section>
        </section>
        <section class="col-md-6 tabla-principal">
            <section class="mapa">
                <div id="map-rutas" style="float:left;width:100%;height:100%;"></div>  
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
</div>

<!-- Administracion-->
<script src="../../Files/js/validarut.js"></script>

<!-- SCRIPT MANEJO MAPA-->
<script type="text/javascript">
                        var directionsDisplay;
                        var directionsService = new google.maps.DirectionsService();
                        var map;
                        var infoWindow = null;

                        $(document).ready(function () {
                            cargarDatos();
                        });

                        function cargarDatos() {
                            var descripcion = "Mi ubicacion";
                            var latitud = -36.61;
                            var longitud = -72.0997;
                            var zoom = 13;

                            var url_json = '../Servlet/administrarEmpresa.php?accion=LISTADO';
                            $.getJSON(
                                    url_json,
                                    function (datos) {
                                        $('#fm').form('load', datos);
                                        initialize();
                                    }
                            );
                        }

                        function initialize() {
                            var latitud = document.getElementById("latitud").value;
                            var longitud = document.getElementById("longitud").value;
                            var descripcion = document.getElementById("descripcionUbicacion").value;
                            var zoom = parseInt(document.getElementById("zoom").value);

                            directionsDisplay = new google.maps.DirectionsRenderer();
                            var coordenadas = new google.maps.LatLng(latitud, longitud);
                            //Definimos opciones para crear el mapa
                            var mapOptions = {
                                zoom: zoom,
                                center: coordenadas}
                            //creamos el mapa con las opciones anteriores y le pasamos el elemento div
                            map = new google.maps.Map(document.getElementById('map-rutas'), mapOptions);

                            directionsDisplay.setMap(map);

                            infoWindow = new google.maps.InfoWindow();

                            agregarMarker(latitud, longitud, descripcion);
                        }

                        function agregarMarker(latitud, longitud, descripcion) {
                            var position = new google.maps.LatLng(latitud, longitud);//-36.61, -72.0997);
                            var marker = new google.maps.Marker({
                                position: position,
                                draggable: true,
                                map: map,
                                title: descripcion,
                                animation: google.maps.Animation.DROP
                            });

                            //marker.setIcon('https://dl.dropboxusercontent.com/u/20056281/Iconos/male-2.png');
                            //marker.setIcon('files/img/persona.png');
                            marker.setMap(map);

                            //Evento al mover de posicion el Marker
                            google.maps.event.addListener(marker, 'mouseup', function () {
                                openInfoWindow(marker);
                            });
                        }

                        function openInfoWindow(marker) {
                            var markerLatLng = marker.getPosition();
                            updatePosition(markerLatLng);
                        }

                        //funcion que simplemente actualiza los campos del formulario
                        function updatePosition(latLng) {
                            jQuery('#latitud').val(latLng.lat());
                            jQuery('#longitud').val(latLng.lng());
                        }

                        //funcion que traduce la direccion en coordenadas
                        function codeAddress() {
                            //obtengo la direccion del formulario
                            var address = document.getElementById("direccion").value;
                            //hago la llamada al geodecoder
                            geocoder.geocode({'address': address}, function (results, status) {

                                //si el estado de la llamado es OK
                                if (status == google.maps.GeocoderStatus.OK) {
                                    //centro el mapa en las coordenadas obtenidas
                                    map.setCenter(results[0].geometry.location);
                                    //coloco el marcador en dichas coordenadas
                                    marker.setPosition(results[0].geometry.location);
                                    //actualizo el formulario      
                                    updatePosition(results[0].geometry.location);

                                    //Añado un listener para cuando el markador se termine de arrastrar
                                    //actualize el formulario con las nuevas coordenadas
                                    google.maps.event.addListener(marker, 'dragend', function () {
                                        updatePosition(marker.getPosition());
                                    });
                                } else {
                                    //si no es OK devuelvo error
                                    alert("No podemos encontrar la direcci&oacute;n, error: " + status);
                                }
                            });
                        }

                        function refrescarMapa() {
                            initialize();
                        }

</script>

<script type="text/javascript">
    function actualizar() {
        if (validarFormulario()) {
            $('#fm').form('submit', {
                url: "../Servlet/administrarEmpresa.php",
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

    function validarFormulario() {
        var direccion = document.getElementById('direccion').value;
        var telefono = document.getElementById('telefono').value;
        var descripcionUbicacion = document.getElementById('descripcionUbicacion').value;
        var latitud = document.getElementById('latitud').value;
        var longitud = document.getElementById('longitud').value;
        var zoom = document.getElementById('zoom').value;

        var valido = true;
        if (direccion == null || direccion.length < 3) {
            valido = false;
            cambiarEstado("direccion", false);
        }
        if (telefono == null || telefono.length < 6 || isNaN(telefono)) {
            valido = false;
            cambiarEstado("telefono", false);
        }
        if (descripcionUbicacion == null || descripcionUbicacion.length < 3) {
            valido = false;
            cambiarEstado("descripcionUbicacion", false);
        }
        if (latitud == null || isNaN(latitud)) {
            valido = false;
            cambiarEstado("latitud", false);
        }
        if (longitud == null || isNaN(longitud)) {
            valido = false;
            cambiarEstado("longitud", false);
        }
        if (zoom == null || isNaN(zoom)) {
            valido = false;
            cambiarEstado("zoom", false);
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

    function mensaje(titulo, mensaje) {
        document.getElementById('logo-mensaje').src = "../../Files/img/iconoInformacion.png";
        $('#titulo-mensaje').html(titulo);
        $('#contenedor-mensaje').html(mensaje);
        $('#dg-mensaje').modal(this)//CALL MODAL MENSAJE
    }

</script>
<?php include 'footer.php'; ?>