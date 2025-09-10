<?php
/**
 * Header template
 *
 * @package Minerva Web Development
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>
		<?php wp_title( '' ); ?>
	</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link rel="apple-touch-icon" href="">
	<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="">
	<meta name="theme-color" content="#121212">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="top">

		<header class="header">

			<?php get_template_part( 'template-parts/header' ); ?>

		</header>
