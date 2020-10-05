<style>
	/*PARTICULAS*/
	#particles-js{
		height: 100vh;
		width: 100%;
		position: fixed;
		z-index: -1;
	}
</style>
<div id="particles-js">
</div>
<div class="cont-login text-center">
	<img src="templates/assets/logo_index.png" width="100%">
	<h5 class="par-neo" style="margin-top:-15px!important;">Restauración de contraseña</h5>
	<div class="f-log">
		<p class="tx-inp"><i class="fas fa-mail"></i><span class="small ml-1">Correo electrónico</span></p>
		<input type="email" class="inp-log" autofocus id="user" onfocus="reset()">
		
		<div id="response" style="margin:10px 0px;border-radius:5px;"></div>
		<button type="button" class="btn btn-primary" style="width:100%;background:#00aff3!important;" onclick="restore()" >Restaurar</button>
		<br><br><a href='index.php'>Iniciar sesión</a>
	</div>
	<div class="footer-log text-center small mt-2">
		<p>&copy; 2020 CPC Oriente <br>Todos los derechos reservados</p>
	</div>
</div>
<script src="templates/js/plugins/particles.js"></script>
<script src="templates/js/app.js"></script>
<script src="templates/js/Log.js"></script>
