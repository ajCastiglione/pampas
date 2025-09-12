<?php
/**
 * Template for displaying the header section
 *
 * @package Minerva Web Development
 */

$logo = get_field( 'logo', 'option' );
if ( ! $logo ) {
	$logo = array(
		'url' => get_stylesheet_directory_uri() . '/screenshot.png',
		'alt' => 'Site Logo',
	);
}

?>

<div class="header absolute w-full z-10 bg-gradient-to-b from-black via-black/40 to-transparent">

	<div class="container flex flex-row justify-between items-center py-6 lg:py-10 w-full">

		<div class="w-1/5">
			<a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow">
				<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="max-w-[175px] md:max-w-xs m-0">
			</a>
		</div>

		<div class="nav-container w-3/5">
			<nav data-js-nav class="nav" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'container'       => false,
						'container_class' => 'menu',
						'menu'            => __( 'The Main Menu', 'mwd' ),
						'menu_class'      => 'main-nav flex flex-row gap-4 md:gap-6 justify-center',
						'theme_location'  => 'main-nav',
						'depth'           => 1,
					)
				);
				?>
			</nav>
		</div>

		<div class="side-nav-container w-1/5">
			<nav class="side-nav" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'container'       => false,
						'container_class' => 'menu',
						'menu'            => __( 'The Side Menu', 'mwd' ),
						'menu_class'      => 'side-nav flex flex-row gap-4 md:gap-6 justify-center',
						'theme_location'  => 'side-nav',
						'depth'           => 1,
					)
				);
				?>
			</nav>
		</div>

	</div>

</div>
