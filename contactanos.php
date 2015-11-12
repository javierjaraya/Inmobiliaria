<?php include 'header.php'; ?>
<!-- GOOGLE MAPS -->
<script src="http://maps.google.com/maps?file=api&v=1&key=AIzaSyBulBjDbfCLCejM7gUa7-sqVkRlkv38tG0" type="text/javascript"></script>
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
            <div id="map" style="width: 400px; height: 300px"></div> 
            <script type="text/javascript">
                
                
            </script>
        </div>
    </div>
</div>            
<script type="text/javascript">
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