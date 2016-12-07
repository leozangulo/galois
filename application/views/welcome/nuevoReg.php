<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Registro</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form name="sentMessage" id="contactForm" novalidate="">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Integrante 1</label>
                            <input type="text" class="form-control" placeholder="Integrante 1" id="name_uno" data-validation-required-message="Por favor ingresa un nombre" aria-invalid="false" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Integrante 2</label>
                            <input type="text" class="form-control" placeholder="Integrante 2" id="name_dos" data-validation-required-message="Por favor ingresa un nombre" aria-invalid="false" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls 3">
                            <label>Integrante 3</label>
                            <input type="text" class="form-control" placeholder="Integrante" id="name_tres" data-validation-required-message="Por favor ingresa un nombre" aria-invalid="false" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Integrante 4</label>
                            <input type="text" class="form-control" placeholder="Integrante 4" id="name_cautro" data-validation-required-message="Por favor ingresa un nombre" aria-invalid="false" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Integrante 4</label>
                            <input type="text" class="form-control" placeholder="Nombre del Equipo" id="equipo" data-validation-required-message="Nombre del equipo" aria-invalid="false" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" id="sendName" class="btn btn-success btn-lg">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sendName').click(function(){
            var data = {
                name_uno : $('#name_uno').val(),
                name_dos : $('#name_dos').val(),
                name_tres : $('#name_tres').val(),
                name_cuatro : $('#name_cautro').val(),
                name_equipo : $('#equipo').val()
            }
            $.ajax({
                method: 'POST',
                url: "<?= base_url('app/addReg') ?>",
                data: data,
                success: function(res) {
                    console.log("Ya se envio al controlador");
                    var token = res;
                    location.href = "<?= base_url('app/index?token=') ?>" + token;
                },
                error: function(err) {
                    console.log(err);
                }
            });
        })
    })
</script>