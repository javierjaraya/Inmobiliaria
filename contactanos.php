<?php include 'header.php'; ?>
<div class="container">  
    <div class="row">
        <div class="col-md-5 formulario-contacto">
            <h3>Contactanos</h3>
            <form role="form">
                <div id="nombreGroup" class="form-group has-feedback">
                    <label class="control-label" for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="nombreStatus" placeholder="Nombre" onchange="validar('nombre')">
                    <span id="nombreIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="nombreStatus" class="sr-only">(success)</span>
                </div>
                <div id="emailGroup" class="form-group has-feedback">
                    <label class="control-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailStatus" placeholder="Introduce tu email"  onchange="validar('email')">
                    <span id="emailIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="emailStatus" class="sr-only">(error)</span>
                </div>
                <div id="telefonoGroup" class="form-group has-feedback">
                    <label class="control-label" for="telefono">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" aria-describedby="telefonoStatus" placeholder="Telefono"  onchange="validar('telefono')">
                    <span id="telefonoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="telefonoStatus" class="sr-only">(error)</span>
                </div>
                <div id="asuntoGroup" class="form-group has-feedback">
                    <label class="control-label" for="asunto">Asunto</label>
                    <input type="text" class="form-control" id="asunto" aria-describedby="asuntoStatus" placeholder="Asunto"  onchange="validar('asunto')">
                    <span id="asuntoIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="asuntoStatus" class="sr-only">(error)</span>
                </div>
                <div id="detalleGroup" class="form-group has-feedback">
                    <label class="control-label" for="detalle">Detalle</label>
                    <textarea type="text" class="form-control" id="detalle" rows="5" aria-describedby="detalleStatus" placeholder="Detalle"  onchange="validar('detalle')">
                    </textarea>
                    <span id="detalleIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span id="detalleStatus" class="sr-only">(error)</span>
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
        <div class="col-md-7">
            <div id="main" class="mapa">
                <div>
                    <address>
                        <p><h4>Direccion:</h4> Av. Arturo Prat #567, Chillan. Region del Bio Bio</p>
                        <p><h4>Fono:</h4> 042-256548</p>
                    </address>
                </div>
                <div id="map-rutas" style="float:left;width:100%;height:100%;"></div>                                
            </div>
        </div>
    </div>
</div>            
<script type="text/javascript">
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var chillan = new google.maps.LatLng(-36.61, -72.0997);
        var mapOptions = {
            zoom: 11,
            center: chillan
        }
        map = new google.maps.Map(document.getElementById('map-rutas'), mapOptions);

        directionsDisplay.setMap(map);

        //setLocationGPS();

    }

    function updateLocation($latitud, $longitud, $descripcion) {
        var position = new google.maps.LatLng($latitud, $longitud);
        var marker = new google.maps.Marker({
            position: position,
            map: map,
            title: $descripcion
        });

        //marker.setIcon('https://dl.dropboxusercontent.com/u/20056281/Iconos/male-2.png');
        marker.setIcon('files/img/persona.png');
        marker.setMap(map);
    }

    function setLocationGPS() {
        var url_json = 'servlet/app/administrarUbicacion.php?accion=OBTENER_LOCATION';
        $.getJSON(
                url_json,
                function (datos) {
                    $.each(datos, function (k, v) {
                        updateLocation(v.latitud, v.longitud, v.phone);
                    });
                }
        );
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    function validar(nombre) {
        var contenido = document.getElementById(nombre).value;
        if (contenido != "" && contenido != null) {
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
</script>
<?php include 'footer.php'; ?>