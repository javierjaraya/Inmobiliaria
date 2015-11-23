<?php include 'header.php'; ?>
<div class="container">    
    <h4>Modelos de Casas</h4>
    <div class="row">
        <div class="col-md-9">
            <div id="contenido-modelos" class="row">

            </div>
        </div><!-- Fin Vista Modelos-->
        <!-- FILTRO -->
        <div class="col-md-3 filtros well center-block">
            <form id="fm-filtro" method="POST">
                <section id="bloqueTituloPrecio">
                    <p id="tituloPrecio">Precio:</p>
                    <div class="form-group">                
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" id="precioDesde" name="precioDesde" placeholder="Desde">                    
                        </div>                
                    </div>            
                    <div class="form-group">                
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" id="precioHasta" name="precioHasta" placeholder="Hasta">                    
                        </div>                
                    </div>   
                </section>
                <section id="bloqueTituloSuperficie">
                    <p id="tituloSuperficie">Superficie:</p>
                    <div class="form-group">                
                        <div class="input-group">
                            <div class="input-group-addon">m2</div>
                            <input type="text" class="form-control" id="superficieDesde" name="superficieDesde" placeholder="Desde">                    
                            <div class="input-group-addon">.00</div>
                        </div>                
                    </div>            
                    <div class="form-group">                
                        <div class="input-group">
                            <div class="input-group-addon">m2</div>
                            <input type="text" class="form-control" id="superficieHasta" name="superficieHasta" placeholder="Hasta">                    
                            <div class="input-group-addon">.00</div>
                        </div>                
                    </div>   
                </section>
                <section id="filtrosRango">
                    <span id="tituloDormitorios">Dormitorios:</span><br>
                    <input name="dormDesde" id="dormDesde" style="width:180px;margin-left:0px;" type="range" min="1" max="6" value="1" step="1" onchange=""><br>
                    <!-- <output id="rangevalue">1</output> -->
                    <!-- rangevalue.value=value -->
                    <p class="rangoNumero1">1+</p>
                    <p class="rangoNumero2">2+</p>
                    <p class="rangoNumero3">3+</p>
                    <p class="rangoNumero4">4+</p>
                    <p class="rangoNumero5">5+</p>
                    <p class="rangoNumero6">6+</p>
                    <br>
                    <br>
                    <span id="tituloBanos">Baños:</span><br>
                    <input name="banosDesde" id="banosDesde" style="width:180px;margin-left:0px;" type="range" min="1" max="6" value="1" step="1" onchange=""><br>
                    <p class="rangoNumero1">1+</p>
                    <p class="rangoNumero2">2+</p>
                    <p class="rangoNumero3">3+</p>
                    <p class="rangoNumero4">4+</p>
                    <p class="rangoNumero5">5+</p>
                    <p class="rangoNumero6">6+</p>

                </section>      
                <button type="button" class="btn btn-primary" onclick="filtrar()">Filtrar</button>          
            </form>         
        </div><!-- Fin Filtro-->
    </div><!-- Fin fila -->
</div><!-- Fin container-->  

<!-- Modal Detalle-->
<div class="modal fade bs-example-modal-lg" id="detalle" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">      
            <section id="panel-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img src="Files/img/logo.jpg" width="120px">
                    <!--<h4 class="modal-title" id="exampleModalLabel">Nombre Modelo</h4> -->
                </div>
                <div class="modal-body">
                    <section class="row">
                        <section class="col-md-4">
                            Detalle
                        </section>
                        <section class="col-md-8">
                            <h4>Caracteristicas tecnicas</h4>
                        </section>
                    </section>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button> 
                </div>-->
            </section>
        </div>
    </div>
</div><!-- END Modal Detalle -->
<!-- Modal Consulta-->
<div class="modal fade bs-example-modal-sm" id="consulta" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <section id="panel-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img src="Files/img/logo.jpg" width="120px">
                    <!--<h4 class="modal-title" id="exampleModalLabel">Nombre Modelo</h4> -->
                </div>
                <div class="modal-body">
                    <section class="row">
                        <section class="col-md-12">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputName1">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFono1">Fono</label>
                                    <input type="tel" class="form-control" id="exampleInputFono1" placeholder="Telefono">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDetalle1">Consulta</label>
                                    <textarea type="text" class="form-control" id="exampleInputDetalle1" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Enviar</button>
                            </form>  
                        </section>
                    </section>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END Modal Consulta-->

<!-- MODAL MENSAJE-->
<div class="modal fade bs-example-modal-sm" id="dg-mensaje" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <section id="panel-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img id="logo-mensaje" src="Files/img/iconoInformacion.png" width="30px">
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
<script type="text/javascript">
    $(document).ready(function () {
        cargarDatos();
    });

    function cargarDatos() {
        var url_json = 'Vista/Servlet/administrarCasa.php?accion=LISTADO';
        $("#contenido-modelos").empty();
        $.getJSON(
                url_json,
                function (data) {
                    $.each(data, function (k, v) {
                        var contenido = "<div class='col-sm-6 col-md-4'>";
                        contenido += "<div class='thumbnail'>";
                        contenido += "<img src='" + v.imagen.rutaImagen + "'>";
                        contenido += "<div class='caption'>";
                        contenido += "    <h3>" + v.nombreModelo + "</h3>";
                        contenido += "    <div class='precio'>";
                        contenido += "        <strong>Desde $ " + formatNumber.new(v.precioKit) + "</strong>";
                        contenido += "    </div>";
                        contenido += "    <section class='resDatos row'>";
                        contenido += "        <section class='dato1 col-md-4'>";
                        contenido += "            <figure><img src='Files/img/icon-dormitorios.png'></figure>";
                        contenido += "            <p class='resDormitorios'>" + v.dormitorio + "</p>";
                        contenido += "        </section>";
                        contenido += "        <section class='dato2 col-md-4'>";
                        contenido += "            <figure><img src='Files/img/icon-banios.png'></figure>";
                        contenido += "            <p class='resBanios'>" + v.banio + "</p>";
                        contenido += "        </section>";
                        contenido += "        <section class='dato3 col-md-4' original-title=''>";
                        contenido += "            <figure><img src='Files/img/icon-medidas.png'></figure>";
                        contenido += "            <p class='resMetraje'>" + v.m2 + "m<sup>2</sup></p>";
                        contenido += "        </section>";
                        contenido += "    </section>";
                        contenido += "    <section class='boton-conoce'>";
                        contenido += "        <form action='administrarModelo' method='GET'>";
                        contenido += "        <p><button type='button' class='btn btn-success' data-toggle='modal' data-target='#detalle' onclick='cargarModal()'>Conoce más</button></p>";
                        contenido += "        <input type='hidden' name='idCasa' value='" + v.idCasa + "'>";
                        contenido += "        <input type='hidden' name='accion' value='MODIFICAR'></form>";
                        contenido += "    </section>";
                        contenido += "</div>";
                        contenido += "</div>";
                        contenido += "</div>";
                        $("#contenido-modelos").append(contenido);
                    });
                }
        );
    }

    function filtrar() {
        if (validarFiltro()) {
            $("#contenido-modelos").empty();
            $('#fm-filtro').form('submit', {
                url: "Vista/Servlet/administrarCasa.php?accion=BUSCAR",
                onSubmit: function () {
                    return $(this).form('validate');
                },
                success: function (datos) {
                    var datos = eval('(' + datos + ')');
                    var existen = false;
                    $.each(datos, function (k, v) {
                        existen = true;
                        var contenido = "<div class='col-sm-6 col-md-4'>";
                        contenido += "<div class='thumbnail'>";
                        contenido += "<img src='" + v.imagen.rutaImagen + "'>";
                        contenido += "<div class='caption'>";
                        contenido += "    <h3>" + v.nombreModelo + "</h3>";
                        contenido += "    <div class='precio'>";
                        contenido += "        <strong>Desde $ " + formatNumber.new(v.precioKit) + "</strong>";
                        contenido += "    </div>";
                        contenido += "    <section class='resDatos row'>";
                        contenido += "        <section class='dato1 col-md-4'>";
                        contenido += "            <figure><img src='Files/img/icon-dormitorios.png'></figure>";
                        contenido += "            <p class='resDormitorios'>" + v.dormitorio + "</p>";
                        contenido += "        </section>";
                        contenido += "        <section class='dato2 col-md-4'>";
                        contenido += "            <figure><img src='Files/img/icon-banios.png'></figure>";
                        contenido += "            <p class='resBanios'>" + v.banio + "</p>";
                        contenido += "        </section>";
                        contenido += "        <section class='dato3 col-md-4' original-title=''>";
                        contenido += "            <figure><img src='Files/img/icon-medidas.png'></figure>";
                        contenido += "            <p class='resMetraje'>" + v.m2 + "m<sup>2</sup></p>";
                        contenido += "        </section>";
                        contenido += "    </section>";
                        contenido += "    <section class='boton-conoce'>";
                        contenido += "        <form action='administrarModelo' method='GET'>";
                        contenido += "        <p><button type='button' class='btn btn-success' data-toggle='modal' data-target='#detalle' onclick='cargarModal()'>Conoce más</button></p>";
                        contenido += "        <input type='hidden' name='idCasa' value='" + v.idCasa + "'>";
                        contenido += "        <input type='hidden' name='accion' value='MODIFICAR'></form>";
                        contenido += "    </section>";
                        contenido += "</div>";
                        contenido += "</div>";
                        contenido += "</div>";
                        $("#contenido-modelos").append(contenido);
                    });

                    if (existen == false) {
                        $("#contenido-modelos").append("No hay casas disponibles.");
                    }
                }
            });
        } else {
            mensaje("Error", "Datos ingresado en el fitro no validos.");
        }
    }

    function validarFiltro() {
        var precioDesde = document.getElementById("precioDesde").value;
        var precioHasta = document.getElementById("precioHasta").value;
        var superficieDesde = document.getElementById("superficieDesde").value;
        var superficieHasta = document.getElementById("superficieHasta").value;
        var valido = true;
        if (isNaN(precioDesde)) {
            valido = false;
        }
        if (isNaN(precioHasta)) {
            valido = false;
        }
        if (isNaN(superficieDesde)) {
            valido = false;
        }
        if (isNaN(superficieHasta)) {
            valido = false;
        }
        return valido;
    }

    function mensaje(titulo, mensaje) {
        $('#titulo-mensaje').html(titulo);
        $('#contenedor-mensaje').html(mensaje);
        $('#dg-mensaje').modal(this)//CALL MODAL MENSAJE
    }

    var formatNumber = {
        separador: ".", // separador para los miles
        sepDecimal: ',', // separador para los decimales
        formatear: function (num) {
            num += '';
            var splitStr = num.split('.');
            var splitLeft = splitStr[0];
            var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
            var regx = /(\d+)(\d{3})/;
            while (regx.test(splitLeft)) {
                splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
            }
            return this.simbol + splitLeft + splitRight;
        },
        new : function (num, simbol) {
            this.simbol = simbol || '';
            return this.formatear(num);
        }
    }
</script>
<?php include 'footer.php'; ?>