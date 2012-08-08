<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Dosis:200,400' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />

	
	<?php wp_head(); ?>
</head>

<body>
<!-- Contenido total web -->
<div id="wrapper">

	<!-- Empieza el header -->
	<header>
		<!-- Zona para logo -->
			<div class="logo">
				<!--<a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" title="Inicio"></a>-->
			</div><!-- fin logo -->
			<div class="titulo">
				<a href="/"><?php bloginfo('name'); ?></a>
			</div>
			<div class="descripcion">
				<?php bloginfo('description'); ?>
			</div>
		<!-- Navegación -->
		<!--<nav>
			<ul>
				<?php wp_nav_menu( array( 'theme_location' => 'nombre-menu1' )); ?>
			</ul>
		</nav>-->
		<!-- FIN navegación -->
	
	</header><!-- FIN header -->
