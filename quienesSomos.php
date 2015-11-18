<?php include 'header.php'; ?>
<div class="container"> 
    <div class="empresa">
        <h3>NUESTRA EMPRESA</h3>
        <div id="contenido-empresa">

        </div>
    </div>
</div>      

<script type="text/javascript">
    $(document).ready(function () {
        cargarDatos();
    });

    function cargarDatos() {
        var url_json = 'Vista/Servlet/administrarEmpresa.php?accion=LISTADO';
        $("#contenido-empresa").empty();
        $.getJSON(
                url_json,
                function (data) {
                    $('#contenido-empresa').html(data.quienesSomos);
                }
        );
    }

</script>
<?php include 'footer.php'; ?>