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

$orientation    = 'left' === get_field( 'media_side' ) ? 'flex-row-reverse' : 'flex-row';
$image_position = 'left' === get_field( 'media_side' ) ? 'flex-col' : 'flex-col-reverse';
$images         = get_field( 'media' );
$content_title  = get_field( 'title' );
$content        = get_field( 'content' );
$gallery        = get_field( 'gallery' );

$container_classes = 'relative container';
$image_classes     = 'w-full grid grid-cols-' . esc_attr( count( $images ) ) . ' gap-4';
$content_classes   = 'w-full';
if ( $gallery ) {
	$image_classes     .= ' md:w-2/5';
	$content_classes   .= ' md:w-3/5';
	$container_classes .= ' pb-16 lg:pb-20';
} else {
	$image_classes     .= ' md:w-3/5';
	$content_classes   .= ' md:w-2/5';
	$container_classes .= ' py-16 lg:py-20';
}
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> text-white">
	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<?php if ( ! empty( $content_title ) ) : ?>
			<div class="md:w-1/2 text-center title text-4xl md:text-5xl mb-8 md:mb-12">
				<?php echo wp_kses_post( $content_title ); ?>
			</div>
		<?php endif; ?>

		<div class="flex <?php echo esc_attr( $image_position ); ?> md:<?php echo esc_attr( $orientation ); ?> <?php echo $gallery ? 'items-start' : 'items-center'; ?> gap-12 md:gap-16">
			<div class="<?php echo esc_attr( $content_classes ); ?>">
				<?php
				if ( $content ) :
					echo wp_kses_post( $content );
				endif;
				?>
				<div class="mt-11 grid grid-cols-2 gap-x-4 md:gap-x-6">
					<?php
					if ( $gallery ) :
						foreach ( $gallery as $index => $image ) :
							$padding_top = 0 !== $index % 2 ? 'pt-6 md:pt-8' : '';
							?>
							<img loading="lazy" class="<?php echo esc_attr( $padding_top ); ?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" decoding="async">
							<?php
						endforeach;
					endif;
					?>
				</div>
			</div>
			<?php if ( $images ) : ?>
				<div class="<?php echo esc_attr( $image_classes ); ?>">
					<?php
					foreach ( $images as $index => $image_row ) :
						$image        = $image_row['image'];
						$padding_top  = 1 === $index ? 'pt-6 md:pt-10' : '';
						$image_sizing = count( $images ) < 2 ? 'w-screen relative left-1/2 right-1/2 -translate-x-1/2 max-h-[400px] overflow-hidden md:static md:w-auto md:max-h-[unset] md:translate-x-0' : 'w-auto h-auto';
						?>
						<div class="<?php echo esc_attr( $padding_top ) . esc_attr( $image_sizing ); ?>">
							<img loading="lazy" class="w-full h-full object-cover" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" decoding="async">
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
