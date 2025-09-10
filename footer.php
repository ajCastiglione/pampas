<?php
/**
 * Footer template
 *
 * @package Minerva Web Development
 */

$logo = get_field( 'dark_logo', 'option' );
if ( ! $logo ) {
	$logo = array(
		'url' => get_stylesheet_directory_uri() . '/screenshot.png',
		'alt' => 'Site Logo',
	);
}
$contact_info = get_field( 'contact_information', 'option' );
$socials      = get_field( 'socials', 'option' );
$top_arrow    = get_stylesheet_directory_uri() . '/library/images/top-arrow.png';

?>
<footer class="footer py-12 relative">
	<div class="container flex flex-row flex-wrap md:flex-nowrap justify-between items-center gap-6 lg:gap-8">
		<div class="w-full md:w-2/5 lg:w-3/5">
			<img class="max-w-xs" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>">
		</div>
		<div class="w-1/3 md:w-1/5">
			<h4 class="text-xl mb-2 font-semibold">Connect</h4>
			<?php if ( $socials ) : ?>
				<ul>
					<?php foreach ( $socials as $social ) : ?>
						<li>
							<a href="<?php echo esc_url( $social['link'] ); ?>" target="_blank" rel="noopener noreferrer">
								<?php echo esc_html( $social['name'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="w-1/3 md:w-1/5">
			<?php if ( $contact_info ) : ?>
				<h4 class="text-xl mb-2 font-semibold">Get in touch</h4>
				<div><?php echo wp_kses_post( $contact_info ); ?></div>
			<?php endif; ?>
		</div>
	</div>

</footer>

<?php wp_footer(); ?>

</body>

</html>
