<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<title>Nutrique - Contacto</title>

	<?php include 'includes/includes.php';?>
	
	<script type="text/javascript" src="js/wow.min.js"></script>
	
	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->
</head>
<body id="contacto">

<?php include 'includes/menu.php';?>

<div id="fullpage">

	<div class="section page1" id="section0">
		<div id="trigger4" class="spacer s4"></div>
		<div class="page_container" style="height:100%;">
			<div class="contacto col-12 col-md-5 offset-md-3">
				<h1 class="col-12 wow animated fadeInUp">CONTACTO</h1>
				<p class="col-12 wow animated fadeInUp" data-wow-delay="100ms">
					Por favor completá tus datos y nos pondremos en contacto con vos.
				</p>
				<form action="gracias" method="post" enctype="multipart/form-data">
					<div class="form-field col-12 col-sm-6 wow animated fadeInUp" data-wow-delay="200ms">
						<input required=required type="text" name="nombre" id="nombre" placeholder="Nombre" />
					</div>
					<div class="form-field col-12 col-sm-6 wow animated fadeInUp" data-wow-delay="300ms">
						<input required=required  type="text" name="apellido" id="apellido" placeholder="Apellido" />
					</div>
					
					<div class="form-field col-12 wow animated fadeInUp" data-wow-delay="400ms">
						<input required=required  type="email" name="email" id="email" placeholder="Email" />
					</div>
					
					<div class="form-field col-12 col-sm-6 wow animated fadeInUp" data-wow-delay="500ms">
						<select required=required  name="pais" id="pais">
							<option value="Argentina">Argentina</option>
						</select>
					</div>
					<div class="form-field col-12 col-sm-6 wow animated fadeInUp" data-wow-delay="600ms">
						<select required=required  name="provincia" id="provincia">
							<option>Provincia</option>
							   <option value="Buenos Aires">Bs. As.</option>
							  <option value="Catamarca">Catamarca</option>
							  <option value="Chaco">Chaco</option>
							  <option value="Chubut">Chubut</option>
							  <option value="Ciudad de Bs. As.">Ciudad de Bs. As.</option>
							  <option value="Cordoba">Cordoba</option>
							  <option value="Corrientes">Corrientes</option>
							  <option value="Entre Rios">Entre Rios</option>
							  <option value="Formosa">Formosa</option>
							  <option value="Jujuy">Jujuy</option>
							  <option value="La Pampa">La Pampa</option>
							  <option value="La Rioja">La Rioja</option>
							  <option value="Mendoza">Mendoza</option>
							  <option value="Misiones">Misiones</option>
							  <option value="Neuquen">Neuquen</option>
							  <option value="Rio Negro">Rio Negro</option>
							  <option value="Salta">Salta</option>
							  <option value="San Juan">San Juan</option>
							  <option value="San Luis">San Luis</option>
							  <option value="Santa Cruz">Santa Cruz</option>
							  <option value="Santa Fe">Santa Fe</option>
							  <option value="Sgo. del Estero">Sgo. del Estero</option>
							  <option value="Tierra del Fuego">Tierra del Fuego</option>
							 <option value="Tucuman">Tucuman</option>
						</select>
					</div>
					
					
					<div class="col-2 form-field wow animated fadeInUp" data-wow-delay="700ms">
						<input required=required  type="number" value="54" name="codpais" id="codpais" placeholder="Cod. País" />
					</div>
					<div class="col-3 form-field wow animated fadeInUp" data-wow-delay="700ms">
						<input required=required  type="number" name="codarea" id="codarea" placeholder="Cod. Area" />
					</div>
					<div class="col-7 form-field wow animated fadeInUp" data-wow-delay="700ms">
						<input required=required  type="number" name="telefono" id="telefono" placeholder="Teléfono" />
					</div>
				
					<div class="form-field col-12 wow animated fadeInUp" data-wow-delay="800ms">
						<select required=required  name="motivo" id="motivo">
							<option value="">Motivo de tu consulta</option>
							<option value="Tengo una mascota">Tengo una mascota</option>
							<option value="Tengo un comercio (veterinaria, pet shop, etc.)"> Tengo un comercio (veterinaria, pet shop, etc.)</option>
							<option value="Otros">Otros</option>
							
							
						</select>
					</div>
					
					<div class="form-field col-12 wow animated fadeInUp" data-wow-delay="900ms">
						<textarea name="mensaje" required=required  placeholder="Mensaje"></textarea>
					</div>
					
					<div class="form-field col-12 wow animated fadeInUp" data-wow-delay="1000ms">
						<a href="#" class="enviar">
							<!--<img src="images/enviar.png" alt="enviar" />-->
						  <input class="submitimage" type="image" name="submit" src="images/enviar.png" />
							 
						</a>
					</div>
				</form>
				
				<h2 class="col-12 wow animated fadeInRight" data-wow-delay="1100ms">Servicio de atención al cliente</h2>
				<p class="col-12 wow animated fadeInRight" data-wow-delay="1200ms">
					<strong>Teléfono:</strong> <a href="tel:08006668226">0800-666-8226</a> | <strong>Mail:</strong> <a href="mailto:info@nutrique.com.ar">info@nutrique.com.ar</a>
				</p>
				<p class="col-12 wow animated fadeInRight" style="" data-wow-delay="1300ms">
					<img src="images/instagram.png" alt="instagram" />
					<strong>Seguinos en:</strong> <a href="https://www.instagram.com/nutriquepetfood/" target="_blank">@nutriquepetfood</a>
				</p>
			</div>
		</div>
		<div class="spacer s4"></div>
	</div>
	
	<?php include 'includes/footer.php';?>
	
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>

<script type="text/javascript">

    var deleteLog = false;
	
	new WOW().init();

    /*var myFullpage = new fullpage('#fullpage', {
		//scrollOverflow: true
    });*/
/*	var slideHeight = $(window).height();
	$('#section0').css('height',slideHeight);
	
	$( document ).ready(function(){
		$('.fondo img').addClass('firstAnimation');
	});
	

	$(window).resize(function(){
		var slideHeight = $(window).height();
		$('#section0').css('height',slideHeight);
	});
*/
</script>

</body>
</html>
