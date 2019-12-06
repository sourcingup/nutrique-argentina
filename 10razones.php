<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<title>Nutrique -  Nutrición Ultra Premium</title>

	<?php include 'includes/includes.php';?>
	
	<script type="text/javascript" src="js/wow.min.js"></script>
	
	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->
</head>
<body id="ultra-premium">

<?php include 'includes/menu.php';?>

<div id="fullpage">

	<div class="section page1" id="section0">
		<div class="page_container" style="height:100%;">
		
			<div class="leftColumnUltra">
				<div class="info" id="info01">
					<img src="images/ingredientes/corona.png" class="corona wow animated lightSpeedIn" alt="linea">
					<h1 class="wow animated flipInY" data-wow-delay="300ms">
						NUTRIQUE ES NUTRICIÓN<br>
						ULTRA PREMIUM
					</h1>
					<p class="wow animated flipInX" data-wow-delay="600ms">
						Nutrique reúne cualidades únicas que la distinguen de la nutrición súper premium, dando origen a una nueva categoría, superior a lo establecido. 
					</p>
					<img src="images/ingredientes/corona.png" class="corona coronaBottom" alt="linea">
				</div>
			</div>
			
			<div class="single-item">
				
				<div class="item">
					<table>
						<tr class="">
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								Productos de consumo habitual
							</td>
							<td style="width: 100px;">
								Productos Nutrique<br>
								Ultra Premium
							</td>
						</tr>
						<tr>
							<td>
								1
							</td>
							<td>
								100% ingredientes naturales y funcionales
							</td>
							<td>
								<img src="images/ultra/x.png" class="check" alt="linea">
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								2
							</td>
							<td>
								Hasta 82% de las proteínas son de origen animal
							</td>
							<td>
								<img src="images/ultra/x.png" class="check" alt="linea">
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								3
							</td>
							<td>
								Sin soja, sin trigo, sin maíz
							</td>
							<td>
								<img src="images/ultra/x.png" class="check" alt="linea">
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								4
							</td>
							<td>
								Sin conservantes artificiales
							</td>
							<td>
								<img src="images/ultra/x.png" class="check" alt="linea">
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								5
							</td>
							<td>
								Probióticos y prebióticos
							</td>
							<td>
								<span>solo prebióticos</span>
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								6
							</td>
							<td>
								Pavo como primer ingrediente
							</td>
							<td>
								<img src="images/ultra/x.png" class="check" alt="linea">
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								7
							</td>
							<td>
								Blend de aceites provenientes de coco, raya  y chía
							</td>
							<td>
								<img src="images/ultra/x.png" class="check" alt="linea">
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								8
							</td>
							<td>
								Mix herbal digestivo
							</td>
							<td>
								<img src="images/ultra/x.png" class="check" alt="linea">
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								9
							</td>
							<td>
								Con cereales integrales de baja carga glucémica
							</td>
							<td>
								<img src="images/ultra/x.png" class="check" alt="linea">
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
						<tr>
							<td>
								10
							</td>
							<td>
								Alto porcentaje de DHA en todos los productos
							</td>
							<td>
								<span>solo en cachorros</span>
							</td>
							<td>
								<img src="images/ultra/Check.png" class="check" alt="linea">
							</td>
						</tr>
					</table>
				</div>
				
				
			</div>
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
	
	$( document ).ready(function() {
		$('.single-item').css('height',slideHeight);
		$('.single-item').addClass('slick-active');
	});
	

	$(window).resize(function(){
		var slideHeight = $(window).height();
		$('#section0').css('height',slideHeight);
	});

</script>

</body>
</html>
