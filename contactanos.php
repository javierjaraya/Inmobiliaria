<?php include 'header.php'; ?>
<div class="container">  
    <div class="row">
        <div class="col-md-5 formulario-contacto">
            <h3>Contactanos</h3>
            <form id="fm" role="form" method="POST">
                <div id="nombreGroup" class="form-group has-feedback">
                    <label class="control-label" for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreStatus" placeholder="Nombre" onchange="validar('nombre', 'text')">
                    <span id="nombreIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="nombreStatus" class="sr-only">(success)</span>
                </div>
                <div id="emailGroup" class="form-group has-feedback">
                    <label class="control-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailStatus" placeholder="Introduce tu email"  onchange="validar('email', 'email')">
                    <span id="emailIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="emailStatus" class="sr-only">(error)</span>
                </div>
                <div id="telefonoGroup" class="form-group has-feedback">
                    <label class="control-label" for="telefono">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoStatus" placeholder="Telefono"  onchange="validar('telefono', 'tel')">
                    <span id="telefonoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="telefonoStatus" class="sr-only">(error)</span>
                </div>
                <div id="asuntoGroup" class="form-group has-feedback">
                    <label class="control-label" for="asunto">Asunto</label>
                    <input type="text" class="form-control" id="asunto" name="asunto" aria-describedby="asuntoStatus" placeholder="Asunto"  onchange="validar('asunto', 'text')">
                    <span id="asuntoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="asuntoStatus" class="sr-only">(error)</span>
                </div>
                <div id="detalleGroup" class="form-group has-feedback">
                    <label class="control-label" for="detalle">Detalle</label>
                    <textarea type="text" class="form-control" id="detalle" name="detalle" rows="5" aria-describedby="detalleStatus" placeholder="Detalle"  onchange="validar('detalle', 'text')"></textarea>
                    <span id="detalleIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="detalleStatus" class="sr-only">(error)</span>
                </div>
                <button type="button" class="btn btn-default" onclick="enviarMensaje()">Enviar</button>
            </form>
        </div>
        <div class="col-md-7">
            <div id="main" class="mapa">
                <div>
                    <address id="datos-contacto">
                        <p><h4>Direccion:</h4> Av. Arturo Prat #567, Chillan. Region del Bio Bio</p>
                        <p><h4>Fono:</h4> 042-256548</p>
                    </address>
                    <input type="hidden" value="" id="descripcionUbicacion" name="descripcionUbicacion" >
                    <input type="hidden" value="" id="latitud" name="latitud">
                    <input type="hidden" value="" id="longitud" name="longitud"> 
                    <input type="hidden" value="" id="zoom" name="zoom" > 
                </div>
                <div id="map-rutas" style="float:left;width:100%;height:100%;"></div>                                
            </div>
        </div>
    </div>

</div>            
<!-- Administracion-->
<script src="Files/js/validarut.js"></script>
<script type="text/javascript">
                    var directionsDisplay;
                    var directionsService = new google.maps.DirectionsService();
                    var map;
                    var infoWindow = null;

                    $(document).ready(function () {
                        cargarDatos();
                    });

                    function cargarDatos() {
                        var url_json = 'Vista/Servlet/administrarEmpresa.php?accion=LISTADO';
                        $.getJSON(
                                url_json,
                                function (datos) {
                                    $('#datos-contacto').html("<p><h4>Direccion:</h4> "+datos.direccion+"</p><p><h4>Fono:</h4> "+datos.telefono+"</p>")
                                    
                                    document.getElementById("latitud").value = datos.latitud;
                                    document.getElementById("longitud").value = datos.longitud;
                                    document.getElementById("descripcionUbicacion").value = datos.descripcionUbicacion;
                                    document.getElementById("zoom").value = datos.zoom;
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
                            map: map,
                            title: descripcion,
                            animation: google.maps.Animation.DROP
                        });
                        marker.setMap(map);
                    }

                    function enviarMensaje() {
                        if (validarFormulario()) {
                            $('#fm').form('submit', {
                                url: "Vista/Servlet/administrarMensaje.php?accion=AGREGAR",
                                onSubmit: function () {
                                    return $(this).form('validate');
                                },
                                success: function (result) {
                                    var result = eval('(' + result + ')');
                                    if (result.success) {
                                        document.getElementById("fm").reset();
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

                    function validarFormulario() {
                        var nombre = document.getElementById('nombre').value;
                        var email = document.getElementById('email').value;
                        var telefono = document.getElementById('telefono').value;
                        var asunto = document.getElementById('asunto').value;
                        var detalle = document.getElementById('detalle').value;

                        var valido = true;

                        if (nombre == null || nombre.length < 3) {
                            valido = false;
                            cambiarEstado("nombre", false);
                        }
                        if (!validarEmail(email)) {
                            valido = false;
                            cambiarEstado("email", false);
                        }
                        if (telefono == null || telefono.length < 6 || isNaN(telefono)) {
                            valido = false;
                            cambiarEstado("telefono", false);
                        }
                        if (asunto == null || asunto.length < 3) {
                            valido = false;
                            cambiarEstado("asunto", false);
                        }
                        if (detalle == null || detalle.length < 3) {
                            valido = false;
                            cambiarEstado("detalle", false);
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

                    function validarEmail(email) {
                        var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                        if (!expr.test(email)) {
                            return false;
                        } else {
                            return true;
                        }
                    }

                    function mensaje(titulo, mensaje) {
                        document.getElementById('logo-mensaje').src = "Files/img/iconoInformacion.png";
                        $('#titulo-mensaje').html(titulo);
                        $('#contenedor-mensaje').html(mensaje);
                        $('#dg-mensaje').modal(this)//CALL MODAL MENSAJE
                    }

</script>
<?php include 'footer.php'; ?>