<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" ng-app="app">

<head>
	<base href="/wordpress/">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(''); ?><?php if( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php the_favicon_url(); ?>" rel="shortcut icon">
	<link href="<?php the_apple_touch_url(); ?>" rel="apple-touch-icon-precomposed" sizes="144x144">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Squarespace" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header class="navbar-fixed">
		<nav class="cyan darken-3">
			<div class="nav-wrapper">
				<a href="<?php echo site_url(); ?>/#/" class="brand-logo hide-on-med-and-down" style="height:100%;">
					<img src="<?php the_logo_url(); ?>" alt="<?php bloginfo( 'name' ); ?>" style="max-height:100%;">
				</a>
				<ul class="right hide-on-med-and-down uppercase">
					<li ng-class="{active: activetab=='/comprar-vivienda'}"><a href="#/comprar-vivienda/">Comprar</a></li>
					<li ng-class="{active: activetab=='/alquilar-vivienda'}"><a href="#/alquilar-vivienda/">Alquilar</a></li>
					<li ng-class="{active: activetab=='/vivienda-favorita'}"><a href="#/vivienda-favorita">Favorito</a></li>
					<li ng-class="{active: activetab=='/contacto'}"><a href="#/contacto">Contacto</a></li>
				</ul>

				<ul id="nav-mobile" class="side-nav uppercase">
					<li ng-class="{active: activetab=='/'}"><a href="#/">Home</a></li>
					<li ng-class="{active: activetab=='/comprar-vivienda'}"><a href="#/comprar-vivienda/">Comprar</a></li>
					<li ng-class="{active: activetab=='/alquilar-vivienda'}"><a href="#/alquilar-vivienda/">Alquilar</a></li>
					<li ng-class="{active: activetab=='/vivienda-favorita'}"><a href="#/vivienda-favorita/">Favorito</a></li>
					<li><div class="divider"></div></li>
					<li ng-class="{active: activetab=='/contacto'}"><a href="#/contacto">Contacto</a></li>
				</ul>
				<a href="javascript:void(0);" class="button-collapse" data-activates="nav-mobile" data-sidenav="left" data-closeonclick="true">
					<i class="material-icons">menu</i>
				</a>

			</div>
		</nav>
	</header>
