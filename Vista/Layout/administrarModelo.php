<?php include 'header.php'; ?>
<?php
$accion = htmlspecialchars($_REQUEST['accion']);
if($accion == "MODIFICAR"){
    $idCasa = htmlspecialchars($_REQUEST['idCasa']);
    echo "<input type='hidden' id='idCasaRecibida' name='idCasaRecibida' value='" . $idCasa . "'>";
}
echo "<input type='hidden' id='accionRecibida' name='accionRecibida' value='" . $accion . "'>";
?>

<div class="container"> 
    <div class="row">
        <section class="col-md-12">
            <section class="col-md-6">
                <form id="fm" method="POST">
                    <div id="runGroup" class="form-group has-feedback">
                        <label class="control-label" for="nombreModelo">Nombde modelo</label>
                        <input type="text" class="form-control" id="nombreModelo" name="nombreModelo" aria-describedby="runStatus" placeholder="Run" onKeyUp="validar('run', 'run');">
                        <span id="runIco" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </form>
            </section>
            <section class="col-md-6">

            </section>
        </section>
    </div>
</div>   
<?php include 'footer.php'; ?>