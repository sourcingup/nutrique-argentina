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
<?php

    $to = "Info@nutrique.com.ar"; 
    $subject = "Contacto desde la web de Nutrique";
	
    $message = "\r\nNombre: ". $_POST['nombre'];
	$message .= "\r\nApellido: ". $_POST['nombre'];
	$message .= "\r\nApellido: ". $_POST['apellido'];
	$message .= "\r\nEmail: ". $_POST['email'];
	$message .= "\r\nPais: ". $_POST['pais'];
	$message .= "\r\nTelefono: ". $_POST['codpais'] . " - ". $_POST['codarea']. " - " . $_POST['telefono'];
	$message .= "\r\nMotivo: ". $_POST['motivo'];
	$message .= "\r\nMensaje: ". $_POST['mensaje'];
	
	
    $from = "Info@nutrique.com.ar";
    $headers = "From:" . $from;

    mail($to, $subject, $message, $headers);

?>
<div id="fullpage">

	<div class="section page1" id="section0">
		<div id="trigger4" class="spacer s4"></div>
		<div class="page_container" style="height:100%;">
			<div class="contacto col-12 col-md-5 offset-md-3">
				<h1 class="col-12 wow animated fadeInUp">CONTACTO</h1>
				<p class="col-12 wow animated fadeInUp" data-wow-delay="100ms">
					Gracias por tu contacto
				</p>
				
				
				<h2 class="col-12 wow animated fadeInRight" data-wow-delay="1100ms">Servicio de atención al cliente</h2>
				<p class="col-12 wow animated fadeInRight" data-wow-delay="1200ms">
					<strong>Telefono:</strong> <a href="tel:08006668226">0800-666-8226</a> | <strong>Mail:</strong> <a href="mailto:info@nutrique.com.ar">info@nutrique.com.ar</a>
				</p>
				<p class="col-12 wow animated fadeInRight" data-wow-delay="1300ms">
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
	var slideHeight = $(window).height();
	$('#section0').css('height',slideHeight);
	
	$( document ).ready(function(){
		$('.fondo img').addClass('firstAnimation');
	});
	

	$(window).resize(function(){
		var slideHeight = $(window).height();
		$('#section0').css('height',slideHeight);
	});

</script>

</body>
</html>
