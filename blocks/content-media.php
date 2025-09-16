<?php
/**
 * Content & Media Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'content-media-block';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'content-media';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$orientation   = 'left' === get_field( 'media_side' ) ? 'flex-row-reverse' : 'flex-row';
$images        = get_field( 'media' );
$content_title = get_field( 'title' );
$content       = get_field( 'content' );

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> text-white">
	<div class="relative container py-16 lg:py-20">
		<div class="md:w-1/2 text-center title text-4xl md:text-5xl mb-8 md:mb-12">
			<?php
			if ( ! empty( $content_title ) ) :
				echo wp_kses_post( $content_title );
			endif;
			?>
		</div>

		<div class="flex flex-col md:<?php echo esc_attr( $orientation ); ?> items-center gap-12 md:gap-16">
			<div class="md:w-2/5 w-full">
				<?php
				if ( $content ) :
					echo wp_kses_post( $content );
				endif;
				?>
			</div>
			<?php if ( $images ) : ?>
				<div class="md:w-3/5 w-full grid grid-cols-2 gap-4">
					<?php
					foreach ( $images as $index => $image_row ) :
						$image       = $image_row['image'];
						$padding_top = 1 === $index ? 'pt-6 md:pt-10' : '';
						?>
						<div class="<?php echo esc_attr( $padding_top ); ?>">
							<img loading="lazy" class="" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" decoding="async">
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
