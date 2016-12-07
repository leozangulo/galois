<section id="portfolio">

    <h2><?= $token ?></h2>

    <div class="container">
        <div class="row">
        	<p>
        		Felicidades, estas apunto de ganar una chiva, creo que de 500 pesos <br>
                Ahora tienes que responder a estas tres preguntas sobre Watson de IBM. Para ello te recomiendo que vayas a la información que está en la Wikipedia.
        	</p>
            <br>
            <div class="form-group">
                <label for="usr">¿Qué juego ganó Watson en 2011?</label>
                <input type="text" class="form-control" id="respone">
                <small id="smallOne"></small>
                <br>
                <button id="validatePreg1">Validar</button>
            </div>
            <div id="pregtwo" class="form-group">
                <label for="pwd">¿En que lenguaje te puedes comunicar con Watson?</label>
                <input type="text" class="form-control" id="resptwo">
                <small id="smallTwo"></small>
                <br>
                <button id="validatePreg2">Validar</button>
            </div>
            <div id="pregthree" class="form-group">
                <label for="pwd">¿Que empresa se desarrolla Watson?</label>
                <input type="text" class="form-control" id="respthree">
                <small id="smallThree"></small>
                <br>
                <button id="validatePreg3">Validar</button>
            </div>

            <?php if ($bandera == 1) { ?>
                <button id="pass">avanzar</button>
                <br><small>Ya has completado este nivel</small>
            <?php } else { ?>
                <input type="password" id="clave" name="clavepista">
                <button id="validate">Validar</button>
            <?php } ?>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#pregtwo').hide();
        $('#pregthree').hide();


        $('#validatePreg1').click(function(){
            var data = {
                respOne: $('#respone').val()
            }
            $.ajax({
                url: '<?= base_url('app/respOne') ?>',
                type: 'POST',
                data: data,
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        //Ya paso la uno
                        $("#smallOne").empty();
                        $("#smallOne").append("Corecto");
                        $('#pregtwo').show();
                    }
                    else {
                        $("#smallOne").empty();
                        $('#smallOne').append("No es la respuesta correcta")
                    }
                }
            });
        });
        //Pregnta dos
        $('#validatePreg2').click(function(){
            var data = {
                respTwo: $('#resptwo').val()
            }
            $.ajax({
                url: '<?= base_url('app/respTwo') ?>',
                type: 'POST',
                data: data,
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        //Ya paso la uno
                        $("#smallTwo").empty();
                        $("#smallTwo").append("Corecto");
                        $('#pregthree').show();
                    }
                    else {
                        $("#smallTwo").empty();
                        $('#smallTwo').append("No es la respuesta correcta")
                    }
                }
            });
        });
        //Pregnta tres
        $('#validatePreg3').click(function(){
            var data = {
                respThree: $('#respthree').val()
            }
            $.ajax({
                url: '<?= base_url('app/respThree') ?>',
                type: 'POST',
                data: data,
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        //Ya paso la uno
                        $("#smallThree").empty();
                        $("#smallThree").append("Corecto");
                        alert("¡Felicidades, ganaste!");
                    }
                    else {
                        $("#smallThree").empty();
                        $('#smallThree').append("No es la respuesta correcta")
                    }
                }
            });
        });

    })
</script>