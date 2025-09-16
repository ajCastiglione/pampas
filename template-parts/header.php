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

	<div class="container flex flex-row gap-6 justify-between items-center py-6 lg:py-10 w-full">

		<div class="w-2/5 md:w-1/5">
			<a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow">
				<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="max-w-[125px] md:max-w-[175px] lg:max-w-xs m-0">
			</a>
		</div>

		<div class="nav-container w-3/5">
			<nav data-js-nav class="nav transition opacity-0 pointer-events-none absolute z-20 top-20 left-0 w-full h-[calc(100vh-5rem)] bg-gray md:static md:bg-transparent md:h-auto md:w-auto md:z-auto md:opacity-100 md:pointer-events-auto" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'container'       => false,
						'container_class' => 'menu',
						'menu'            => __( 'The Main Menu', 'mwd' ),
						'menu_class'      => 'main-nav p-8 md:p-0 flex flex-col md:flex-row gap-4 md:gap-6 justify-center',
						'theme_location'  => 'main-nav',
						'depth'           => 1,
					)
				);
				?>
			</nav>
		</div>

		<div class="side-nav-container w-3/5 md:w-1/5">
			<nav class="side-nav flex flex-row items-center justify-end gap-4" role="navigation">
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
				<div data-js-nav-toggle>
					<i class="fa-solid fa-bars text-white md:hidden text-3xl" aria-label="Toggle Navigation"></i>
				</div>
			</nav>
		</div>

	</div>

</div>
