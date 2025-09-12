<?php
/**
 * Partial for displaying reviews in the footer.
 *
 * @package Minerva Web Development
 */

$opts            = get_field( 'footer', 'option' );
$content         = $opts['reviews_content'] ?? '';
$reviews_to_show = $opts['reviews_to_show'] ?? null;
$gallery         = $opts['reviews_images'] ?? array();

?>
<section class="reviews bg-gray py-10 md:py-16">
	<div class="container">
		<div class="flex flex-col md:flex-row items-center justify-between mb-20">
			<div class="md:w-1/2 text-white"><?php echo wp_kses_post( $content ); ?></div>
			<div class="md:w-1/2"></div>
		</div>

		<?php if ( $gallery ) : ?>
		<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 place-items-center gap-12 lg:gap-40">
			<?php foreach ( $gallery as $image ) : ?>
				<div class="w-auto max-w-48">
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>

</section>
