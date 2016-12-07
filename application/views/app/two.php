<style type="text/css">
    iframe {
        border: 0;
    }
</style>
<section id="portfolio">

    <h2><?= $token ?></h2>

    <div class="container">
        <div class="row">
        	<p>
        		Felicidades, acabas de pasar la primer prueba
        	</p>

        	<iframe src="http://inndotfase2.mybluemix.net/" width="100%" height="450px" marginwidth="0" marginheight="0" border=0></iframe>
        	
        	<p>
        	   Consigue la imagen final, toma una foto y adquiere el código para la siguiente fase. ¡Suerte!
        	</p>
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
        $('#validate').click(function(){
            console.log("hola watson");
            var data = {
                clave: $('#clave').val()
            }
            console.log(data);
            $.ajax({
                url: '<?= base_url('app/validateTwo') ?>',
                type: 'POST',
                data: data,
                success: function(data) {
                    //console.log(data)
                    if (data == 1) {
                        //console.log("El pass esta correcto")
                        location.href = "<?= base_url('app/three') ?>";
                    }
                    else {
                        //console.log("El pass es incorrecto")
                        alert("La clave no es correcta")
                    }
                }
            });
        })

        $('#pass').click(function(){
            console.log("pass");
            location.href = "<?= base_url('app/three') ?>";
        })
    })
</script>