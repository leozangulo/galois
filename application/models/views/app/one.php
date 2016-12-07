<style type="text/css">
	iframe {
	    border:0;
	}
</style>
<section id="portfolio">

    <h2><?= $token ?></h2>

    <div class="container">
        <div class="row">
        	<p>
        		Estas en la primer etapa del juego. Lee las siguientes instrucciones para saber como pasar a la siguiente etapa.<br>
        	</p>

        	<iframe src="http://conversacioninn.mybluemix.net/" width="100%" height="350px" marginwidth="0" marginheight="0" border=0></iframe>
        	
        	<p>
        		Una vez que ingreses la combinación correncta, Watson te daŕa una clave de 6 caracteres que deberás de ingresar al campo que aparece un poco más abajo y dar en el boton siguente. Si la clave es correcta podrás avanzar, si no deberas seguir intentandolo.
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
				url: '<?= base_url('app/validateOne') ?>',
				type: 'POST',
				data: data,
				success: function(data) {
					//console.log(data)
					if (data == 1) {
						//console.log("El pass esta correcto")
						location.href = "<?= base_url('app/two') ?>";
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
			location.href = "<?= base_url('app/two') ?>";
		})
	})
</script>
