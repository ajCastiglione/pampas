<?php
/**
 * Template for displaying responsive gallery slider.
 *
 * @package Minerva Web Development
 */

$opts    = get_field( 'footer', 'option' );
$gallery = $opts['slider_gallery'] ?? null;
if ( ! $gallery ) {
	return;
}

// Enqueue slick slider scripts and styles. Check if slick is already enqueued.
if ( ! wp_script_is( 'slick-slider-js', 'enqueued' ) ) {
	wp_enqueue_script( 'slick-slider-js' );
}
if ( ! wp_style_is( 'slick-slider-css', 'enqueued' ) && ! wp_style_is( 'slick-slider-theme-css', 'enqueued' ) ) {
	wp_enqueue_style( 'slick-slider-css' );
	wp_enqueue_style( 'slick-slider-theme-css' );
}

?>

<section class="footer-gallery">
	<div>
		<div data-gallery-container>
			<?php foreach ( $gallery as $image ) : ?>
				<div>
					<img
						class="w-full h-auto"
						src="<?php echo esc_url( $image['url'] ); ?>"
						alt="<?php echo esc_attr( $image['alt'] ); ?>"
					/>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
