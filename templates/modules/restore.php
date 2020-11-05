<style>
	/*PARTICULAS*/
	#particles-js{
		height: 100vh;
		width: 60%;
		position: fixed;
		z-index: -1;
	}
</style>
<div class="row">
	<div class="col-sm-12 col-md-7 col-lg-7 text-center">
		<div id="particles-js">
		</div>
		<img class="img-login" src="templates/assets/logo_index.png" width="60%">

	</div>
	<div class="col-sm-12 col-md-5 col-lg-5">
		<div class="cont-login text-center">
			<br>
			<br>
			<h4 class="par-neo tit-login" style="margin-top:-15px!important;">Restaurar Contraseña</h4>
			<br>
			<div class="f-log">
				<div class="row">
					<div class="col-2">
						<span class="ico-login"><i class="fa fa-envelope"></i></span>
						
					</div>
					<div class="col-10">
						<input type="email" class="inp-log" autofocus id="user" onfocus="reset()" placeholder="Correo Electronico">
					</div>
				</div>

			</div>
			<div class="cont-btns text-center mt-4">
				
				<button type="button" class="btn-log" onclick="restore()">Restaurar</button>
				<a href='index.php' class="olv-cont">Iniciar Sesión</a>
			</div>
			<div class="text-center pd-4 mt-4">
					<div id="response" class="resp-login"></div>
					
			</div>
		</div>
		<div class="footer-log text-center small mt-2">
			<p>&copy; 2020 CPC Oriente <br>Todos los derechos reservados</p>
		</div>
		
	</div>
</div>
<script src="templates/js/plugins/particles.js"></script>
<script src="templates/js/app.js"></script>
<script src="templates/js/Log.js"></script>
