<?php
include_once("./_init.php"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, maximum-scale=1">
		<!--OpenGraph tags-->
		<meta property="og:title" content="<?php echo $site->site_title?>" /> 
	    <meta property="og:type" content="website" /> 
	    <meta property="og:url" content="<?php echo $site->httpUrl?>" />
	    <meta property="og:image" content="<?php echo $site->site_image->httpUrl?>" /> 
	    <meta property="og:site_name" content="<?php echo $site->site_title?>"/> 
	    <meta property="og:description" content="<?php echo $site->site_description?>" /> 

		<title><?php echo $site->site_title?> :: <?php echo $page->title; ?></title>
		<meta name="description" content="<?php echo $site->site_description?>" />
		<link rel="stylesheet" href="<?php echo AIOM::CSS(array('css/styles.css', 'css/layout.less', 'css/jquery.fancybox-1.3.4.css', 'font-awesome-4.3.0/css/font-awesome.min.css' )); ?>">
	</head>	
	<body>
		<?php include_once("analyticstracking.php") ?>
		<a id="Home"></a>
		<div id="nav">
			<div id="navitems">
				<ul>
					<li><a href="#Home">Día Mundial del Libro</a></li>
					<li><a href="#Streaming">Streaming</a></li>
					<li><a href="#Semblanzas">Semblanzas</a></li>
					<li><a href="#Actividades">Actividades</a></li>
					<li><a href="#Ubicacion">Ubicación</a></li>
				</ul>
			</div>
		</div>
		<div id="dgp">
			<img src="<?php echo $config->urls->templates?>images/logo_dgp.png" alt="">
		</div>
		<div class="contentsection" id="header">
			<div class="content">
				<h1>Día Mundial del Libro y del Derecho de Autor</h1>
				<h2>20 aniversario del <br /> <b>Programa Nacional <br />Salas de Lectura</b></h2>
				<h3>Centenario de Edmundo Valadés · 80 años de Fernando del Paso</h3>
				</div>
				<p class="location"><i class="fa fa-map-marker"></i> Explanada del Palacio de Bellas Artes <i class="fa fa-calendar"></i> 19 de abril, 2015 <i class="fa fa-clock-o"></i> a partir de las 10 h</p>
				<p class="redes sociales">
				<a href="https://www.facebook.com/fsalasdelectura"><i class="fa fa-facebook-square fa-lg"></i>fSalasdelectura</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="https://twitter.com/salasdelectura"><i class="fa fa-twitter-square fa-lg"></i>@Salasdelectura</a>&nbsp;&nbsp;&nbsp;&nbsp; 
				<a href="https://instagram.com/Salasdelectura/"><i class="fa fa-instagram fa-lg"></i>Salasdelectura</a>&nbsp;&nbsp;&nbsp;&nbsp; 
				<i class="fa fa-birthday-cake"></i>#Salas20AñosDeLectura</a> 
				</p>
				<p class="arrow"><a href="#Actividades"><img src="<?php echo $config->urls->templates?>images/arrow.png" alt=""></a></p>
			</div>
		</div>
		<a id="Streaming"></a>
		<div class="contentsection red clearfix s1">
			<div class="content">
				<div class="centercontentt">
					<div style="float:left; padding-right: 3em;">
					<h2><a href="<?php echo $site->site_streaming?>"><i class="fa fa-youtube-play fa-5x"></i></a></h2>
					</div>
					<div style="padding-top: 3em;">
					<p><a href="<?php echo $site->site_streaming?>">Sigue las actividades del Día Mundial del Libro y del Derecho de Autor por streaming.</a></p>
					</div>
				</div>
			</div>
			<div class="filter"></div>
		</div>
		<a id="Actividades"></a>
		<div class="contentsection clearfix beige">
			<div class="content">
				<div class="sectioninfo relative">
					<h2>Actividades</h2>
					<p>Conoce las actividades de los diversos foros que se encuentran ubicados en la explanda del Palacio de Bellas Artes.</p>
					<div id="sidemenu">
					<ul>
					<?php
					// cycle through all the children
					foreach($foros as $foro) {
						echo "<li>";
						// output the link markup
						echo "<a href='#$foro->name'>$foro->title</a>";
						echo "</li>";

					}
					?>
					</ul>
					</div>
				</div>
				<div class="normalcontent">
					<div class="agenda">
						<?php
						// cycle through all the children
						foreach($foros as $foro) {
							echo "
								 <div id='$foro->name' class='agendaitem'>
								 	<div class='agendaday'>
									 	<div class='agendadaydate'>
									 		<span class='month'>$foro->title</span>
									 	</div>
								 	</div>
							 	";

							$sac = $pages->find("parent=/actividades/, lugar=$foro->name");
							foreach($sac as $activity) {

								echo "
									 <div class='session'>
										<h3>$activity->title</h3>
										<p class='time'><i class='fa fa-clock-o'></i>$activity->hora_de_inicio – $activity->hora_termina h</p>
										<div>$activity->descripcion</div>";
										$participantes = $activity->Participantes;
										if ($participantes != '') {
											echo "<p>Con ";
										$lista = '';
										foreach ($participantes as $participante) {
											if ($participante->biografia == '') {
												$lista .= "$participante->title, ";
											} else {
											$lista .= "<a href='$participante->url'>$participante->title</a>, ";
											}
										}
										$lista = substr($lista, 0, strlen($lista) - 2);
										$lista = preg_replace('/,([^,]*)$/', ' y \1', $lista);
										echo "$lista </p>";

										}
										

								echo "</div>";
				
							}
							echo "</div>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<a id="Semblanzas"></a>
		<?php
		foreach ($semblanzas as $semblanza) {
			$foto = $semblanza->foto_semblanza->width(350);
			echo "
			<div class='contentsection dark clearfix s1'>
				<div class='content'>
					<div class='sectioninfo relative'>
						<div><img src='$foto->url' alt='$foto->description'></div>
						<figcaption>$foto->description</figcaption>
					</div>
					<div class='normalcontent'>
					<h2>$semblanza->title</h2>
						$semblanza->semblanza
					</div>
				</div>
				<div class='filter'></div>
			</div>
			";
		}
		?>
		<a id="Ubicacion"></a>
		<div class="contentsection dark clearfix">
			<div class="content">
				<h2>Ubicación</h2>
				<p><strong>Explanada del Palacio de Bellas Artes.</strong> Avenida Juárez, esquina Eje Central Lázaro Cárdenas, Centro Histórico, Cuauhtémoc, 06050. Ciudad de México</p>
					<p><a href="#" class="getLocation">¿Cómo llegar?</a></p>
				<div id="map_canvas" data-lat="19.435452" data-long="-99.141174"></div>
			</div>
			<div class="filter"></div>
		</div>
		<div id="footer" class="contentsection dark clearfix">
			<div class="footercontent">
				<p style="color: #2a2a2a;">PARTICIPAN:</p>
				<p><img src="<?php echo $config->urls->templates?>images/logos.png" alt=""></p>
				<p style="color: #2a2a2a;">CONACULTA, MÉXICO - ALGUNOS DERECHOS RESERVADOS © DIRECCIÓN GENERAL DE PUBLICACIONES 2015</p>
				<p><img src="<?php echo $config->urls->templates?>images/pie.png" alt=""></p>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="<?php echo AIOM::JS(array('js/jquery.sticky.js', 'js/jquery.mousewheel-3.0.4.pack.js', 'js/jquery.fancybox-1.3.4.pack.js', 'js/jqueryeasing.js', 'js/site.js')); ?>"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaXBe4RxtbrU2clirhC4fpzY4E6riZC_Y&amp;sensor=false"></script>
			</div>
		</div>
	</body>
</html>