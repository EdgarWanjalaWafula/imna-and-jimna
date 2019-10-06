<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ImnaJimna
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<!-- Preloader  -->
	<div class="ij-preloader">
		<div class="sbl-square-to-circle">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
<div id="page" class="site animated fadeIn slow">
	
	<div id="content" class="site-content">
