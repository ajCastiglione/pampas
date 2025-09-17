<?php
/**
 * Footer template
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
$contact_info = get_field( 'contact_information', 'option' );
$socials      = get_field( 'socials', 'option' );

?>
<footer class="footer relative bg-black">
	<?php get_template_part( 'template-parts/footer/reviews' ); ?>
	<?php get_template_part( 'template-parts/footer/map' ); ?>
	<?php get_template_part( 'template-parts/footer/gallery' ); ?>
	<?php get_template_part( 'template-parts/footer/newsletter' ); ?>

	<div class="container py-12">
		<div class="w-full mb-12">
			<img class="max-w-xs" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>">
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 items-start gap-x-6 lg:gap-16 text-white mx-auto md:pl-12 lg:pl-14">
			<?php if ( $contact_info ) : ?>
			<div>
				<h4 class="text-2xl mb-4 font-semibold">GET IN TOUCH</h4>
				<p><?php echo wp_kses_post( $contact_info['hours'] ); ?></p>
				<p><?php echo wp_kses_post( $contact_info['address'] ); ?></p>
				<p><?php echo wp_kses_post( $contact_info['phone'] ); ?></p>
				<?php if ( $socials ) : ?>
					<ul class="flex space-x-4 mt-4">
						<?php foreach ( $socials as $social ) : ?>
							<li>
								<a class="bg-white text-black rounded-full p-1 aspect-square inline-flex items-center justify-center transition hover:bg-yellow" href="<?php echo esc_url( $social['link'] ); ?>" target="_blank" rel="noopener noreferrer">
									<?php echo wp_kses_post( $social['name'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="mt-8 md:mt-0">
				<h4 data-js-footer-nav-toggle class="flex justify-between items-center text-2xl font-semibold border-t-2 border-gray py-2 md:border-none md:py-0">DINING <i class="fa-solid fa-angle-down md:hidden text-white"></i></h4>
				<div class="hidden md:block pb-4">
					<?php if ( has_nav_menu( 'dining-nav' ) ) : ?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'dining-nav',
								'menu_class'     => 'space-y-2 footer-nav',
								'container'      => false,
								'depth'          => 1,
							)
						);
						?>
				</div>
				<?php endif; ?>
			</div>
			<div>
				<h4 data-js-footer-nav-toggle class="flex justify-between items-center text-2xl font-semibold border-t-2 border-gray py-2 md:border-none md:py-">EVENTS & CATERING <i class="fa-solid fa-angle-down md:hidden text-white"></i></h4>
				<div class="hidden md:block pb-4">
					<?php if ( has_nav_menu( 'events-nav' ) ) : ?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'events-nav',
								'menu_class'     => 'space-y-2 footer-nav',
								'container'      => false,
								'depth'          => 1,
							)
						);
						?>
					<?php endif; ?>
				</div>
			</div>
			<div>
				<h4 data-js-footer-nav-toggle class="flex justify-between items-center text-2xl font-semibold border-t-2 border-gray py-2 md:border-none md:py-">ABOUT <i class="fa-solid fa-angle-down md:hidden text-white"></i></h4>
				<div class="hidden md:block pb-4">
					<?php if ( has_nav_menu( 'about-nav' ) ) : ?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'about-nav',
								'menu_class'     => 'space-y-2 footer-nav',
								'container'      => false,
								'depth'          => 1,
							)
						);
						?>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>

	<div class="copyright text-white text-center bg-black py-6 px-4">
		<p class="text-sm">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved. Privacy Policy, Terms of Use, and Accessibility Statement.</p>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>
