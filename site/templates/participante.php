<?php
include_once("./_init.php"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, maximum-scale=1">
		<!--OpenGraph tags-->
		<meta property="og:title" content="<?php echo $page->title?> en el <?php echo $site->site_title?>" /> 
	    <meta property="og:type" content="website" /> 
	    <meta property="og:url" content="<?php echo $site->httpUrl?>" />
	    <meta property="og:image" content="<?php echo $page->fotografia->httpUrl?>" /> 
	    <meta property="og:site_name" content="<?php echo $site->site_title?>"/> 
	    <meta property="og:description" content="<?php echo $site->site_description?>" /> 

		<title><?php echo $page->title?> en el <?php echo $site->site_title?></title>
		<meta name="description" content="<?php echo $site->site_description?>" />	
		<link rel="stylesheet" href="<?php echo $config->urls->templates?>css/styles.css" type="text/css">
		<link rel="stylesheet" href="<?php echo $config->urls->templates?>css/layout.css" type="text/css">
		<link rel="stylesheet" href="<?php echo $config->urls->templates?>font-awesome-4.3.0/css/font-awesome.min.css" type="text/css">
	</head>	
	<body>
		<div id="dgp">
			<img src="<?php echo $config->urls->templates?>images/logo_dgp.png" alt="">
		</div>
		<a id="Home"></a>

		<a id="Perfil"></a>
		<div class="contentsection clearfix beige">
			<div class="content">
				<div class="sectioninfo relative">
					<?php if ($page->fotografia): ?>
					<?php $foto = $page->fotografia->width(350); ?>
					<div><img class="author" src="<?php echo $foto->url?>" alt="<?php echo $foto->description?>"/><figcaption><?php echo $foto->description?></figcaption></div>
					<?php endif; ?>
					<h2><?php echo $page->title?></h2>
					<a href="<?php echo $site->url?>"><i class="fa fa-arrow-left"></i> Volver a la página principal. <br />::Día Mundial del Libro y del Derecho de Autor::</a>
				</div>
				<div class="normalcontent">

					<div><?php echo $page->biografia?></div>
					<div><p><strong><?php echo $page->title?> estará presente en la siguiente actividad:</p></strong></div>
					<div class="agenda">
						<?php
						// cycle through all the children
						$participante = $page->title;
						$acts = $pages->find("parent=/actividades/, Participantes=$participante");
						foreach($acts as $act) {
							$lugar = $act->lugar->title;
							echo "
								 <div id='$foro->name' class='agendaitem'>
								 	<div class='agendaday'>
									 	<div class='agendadaydate'>
									 		<span class='month'>$lugar</span>
									 	</div>
								 	</div>
							 	";
								echo "
									 <div class='session'>
										<h3>$act->title</h3>
										<p class='time'><i class='fa fa-clock-o'></i>$act->hora_de_inicio – $act->hora_termina h</p>
										<div>$act->descripcion</div>
									 </div>
								 </div>
									 ";

						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="footer" class="contentsection dark clearfix">
			<div class="footercontent">
				<p style="color: #2a2a2a;">PARTICIPAN:</p>
				<p><img src="<?php echo $config->urls->templates?>images/logos.png" alt=""></p>
				<p style="color: #2a2a2a;">CONACULTA, MÉXICO - ALGUNOS DERECHOS RESERVADOS © DIRECCIÓN GENERAL DE PUBLICACIONES 2015</p>
				<p><img src="<?php echo $config->urls->templates?>images/pie.png" alt=""></p>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="<?php echo $config->urls->templates?>js/jquery.sticky.js"></script>
		<script src="<?php echo $config->urls->templates?>js/jquery.sticky.js"></script>
		<script type="text/javascript" src="<?php echo $config->urls->templates?>js/jquery.mousewheel-3.0.4.pack.js"></script>
		<script type="text/javascript" src="<?php echo $config->urls->templates?>js/jquery.fancybox-1.3.4.pack.js"></script>
		<script src="<?php echo $config->urls->templates?>js/jqueryeasing.js"></script>
		<script src="<?php echo $config->urls->templates?>js/site.js"></script>
			</div>
		</div>
	</body>
</html>