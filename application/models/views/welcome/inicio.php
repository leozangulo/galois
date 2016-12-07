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
                            <label>Clave</label>
                            <input type="text" class="form-control" placeholder="Clave (Dos letras y dos numeros)" id="token" required="" data-validation-required-message="Ingresa una clave" aria-invalid="false">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div id="error">
                        </div>
                    </div>                    
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" id="sendToken" class="btn btn-success btn-lg">Iniciar</button>
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
        $('#sendToken').click(function(){
            var data = {
                token : $('#token').val()
            }
            //console.log(data)
            $.ajax({
                method: 'POST',
                url: "<?= base_url('app/inicio') ?>",
                data: data,
                success: function(data) {
                    var dataObject = jQuery.parseJSON(data)
                    console.log(dataObject.code);

                    if (dataObject.code == 0) {
                        $('#error').empty();
                        $('#error').append("Te equivocaste de ID de grupo, intentalo de nuevo");
                    }

                    else {
                        location.href = "<?= base_url('app/index?token=') ?>" + dataObject.token;
                    }

                },
                error: function(err) {
                    console.log(err);
                }
            });
        })
    })
</script>