<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<title>Nutrique - Nutrición Natural y Funcional</title>

	<?php include 'includes/includes.php';?>
	
	<script type="text/javascript" src="js/wow.min.js"></script>
	
	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->
</head>
<body id="conoce-nutrique" class="nutricion">

<?php include 'includes/menu.php';?>

<div id="fullpage">

	<div class="section page1" id="section0">
		<div id="trigger4" class="spacer s4"></div>
		<div class="page_container" style="">
			<div class="col-6 col-sm-3 column columnConoce">
				<img src="images/bowl-01.png" class="conoce conoce-perro" />
			</div>
			<div class="col-12 col-sm-6 column columnCenter" style="z-index: 2;">
				<div class="info col-12">
					<h1 class="wow animated flipInY">
						Nutrición Natural y Funcional
					</h1>
					<p class="wow animated fadeInUp" data-wow-delay="100ms">
						Nutrique revoluciona el paradigma de la nutrición gracias a su innovadora combinación, que reúne las ventajas de la alimentación Natural con los beneficios de la Funcional.
					</p>
					<img src="images/linea.png" class="linea wow animated fadeInRight" data-wow-delay="200ms" />
					<p class="wow animated fadeInUp" data-wow-delay="300ms">
						La nutrición Natural se basa en que cada uno de los ingredientes provengan de la naturaleza, mientras que la alimentación Funcional debe cumplir un propósito específico en el bienestar de la mascota.<br><br>
						<strong>Nutrique lo garantiza porque:</strong>
					</p>
					<h3 class="wow animated fadeInUp" data-wow-delay="400ms">
						<img src="images/ingredientes/lines.png" class="linea" />
						Fortalece los mecanismos de defensa biológica.
					</h3>
					<h3 class="wow animated fadeInUp" data-wow-delay="500ms">
						<img src="images/ingredientes/lines.png" class="linea" />
						Mejora las condiciones físicas y mentales del animal.
					</h3>
					<h3 class="wow animated fadeInUp" data-wow-delay="600ms">
						<img src="images/ingredientes/lines.png" class="linea" />
						Retrasa los procesos de envejecimiento celular.
					</h3>
					<h3 class="wow animated fadeInUp" data-wow-delay="700ms">
						<img src="images/ingredientes/lines.png" class="linea" />
						Previene determinadas enfermedades. 
					</h3>
					<p class="wow animated fadeInUp" data-wow-delay="800ms">
						Nutrique genera una mayor expectativa de vida, dando un nuevo paso en el avance de la nutrición de las mascotas. 
					</p>
					<img src="images/linea.png" class="linea" />
					<h2 class="wow animated fadeIn" data-wow-delay="900ms">
						<a href="ingredientesfuncionales">
							<img src="images/bowl-info-left.png" class="linea wow animated fadeInLeft" data-wow-delay="1000ms" />
							Conocé por qué Cada Ingrediente Nutrique Tiene un Propósito
							<img src="images/bowl-info-right.png" class="linea wow animated fadeInRight" data-wow-delay="1000ms" />
						</a>
					</h2>
				</div>
			</div>
			<div class="col-6 col-sm-3 column columnConoce">
				<img src="images/bowl-02.png" class="conoce conoce-gato" />
			</div>
			<div class="spacer s4"></div>
		</div>
	</div>
	<?php include 'includes/footer.php';?>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>

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
	
	var lFollowX = 0,
	lFollowY = 0,
	x = 0,
	y = 0,
	friction = 1 / 30;

	function moveBackground() {
	  
	  x += (lFollowX - x) * friction;
	  y += (lFollowY - y) * friction;
	  
	  translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

	  $('.conoce').css({
		'-webit-transform': translate,
		'-moz-transform': translate,
		'transform': translate
	  });

	  window.requestAnimationFrame(moveBackground);
	}

	$(window).on('mousemove click', function(e) {

	  var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
	  var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
	  lFollowX = (15 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
	  lFollowY = (8 * lMouseY) / 100;

	});
	
	moveBackground();

</script>

</body>
</html>
