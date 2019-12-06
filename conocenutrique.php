<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<title>Nutrique - Nutrición Natural y Funcional para la plenitud física y mental de las mascotas</title>

	<?php include 'includes/includes.php';?>
	
	<script type="text/javascript" src="js/wow.min.js"></script>
	
	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->
</head>
<body id="conoce-nutrique">

<?php include 'includes/menu.php';?>

<div id="fullpage">

	<div class="section page1" id="section0">
		<div id="trigger4" class="spacer s4"></div>
		<div class="page_container" style="">
			<div class="col-6 col-sm-3 column columnConoce">
				<img src="images/conoce-perro.png" class="conoce conoce-perro" />
			</div>
			<div class="col-12 col-sm-6 column columnCenter" style="z-index: 2;">
				<div class="info col-12">
					<h1 class="wow animated flipInY" data-wow-delay="300ms">
						Conocé Nutrique
					</h1>
					<img src="images/linea.png" class="linea" />
					<p>
						Nutrique combina la sabiduría de la naturaleza con el avance de la ciencia. Formulado con ingredientes naturales, cuidadosamente seleccionados por su pureza y calidad. Cada uno de ellos cumple una función específica en el organismo de las mascotas. Esto hace a Nutrique una línea Ultra Premium que brinda a las mascotas bienestar físico y mental en cada etapa de sus vidas.
					</p>
				</div>
				<div class="col-12 col-md-8 offset-md-2 column" style="padding: 0;">
					<a class="col-4 column wow animated flipInX">
						<img src="images/homeUltraPremium/placa-01.png" alt="Ultra Premium" />
					</a>
					<a class="col-4 column wow animated flipInX" data-wow-delay="200ms">
						<img src="images/homeUltraPremium/placa-02.png" alt="Ultra Premium" />
					</a>
					<a class="col-4 column wow animated flipInX" data-wow-delay="400ms" >
						<img src="images/homeUltraPremium/placa-03.png" alt="Ultra Premium" />
					</a>
				</div>
				<div class="col-12 col-md-8 offset-md-2 column" style="margin-top: 15px;padding: 0;">
					<a class="col-4 column wow animated flipInX">
						<img src="images/homeUltraPremium/placa-04.png" alt="Ultra Premium" />
					</a>
					<a class="col-4 column wow animated flipInX" data-wow-delay="200ms">
						<img src="images/homeUltraPremium/placa-05.png" alt="Ultra Premium" />
					</a>
					<a class="col-4 column wow animated flipInX" data-wow-delay="400ms">
						<img src="images/homeUltraPremium/placa-06.png" alt="Ultra Premium" />
					</a>
				</div>
			</div>
			<div class="col-6 col-sm-3 column columnConoce">
				<img src="images/conoce-gato.png" class="conoce conoce-gato" />
			</div>
			<div class="spacer s4"></div>
		</div>
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
