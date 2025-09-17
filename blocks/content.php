<?php
/**
 * Content Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'content-block';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'content-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$bg_color = get_field( 'background_color' );
$content  = get_field( 'content' );

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> bg-<?php echo esc_attr( $bg_color ); ?> text-white py-10 lg:py-16 text-center">
	<div class="container relative">
		<div class="flex flex-col justify-center items-center gap-12 md:gap-16">
			<div class="w-full">
				<?php
				if ( $content ) :
					echo wp_kses_post( $content );
				endif;
				?>
			</div>
		</div>
	</div>
</section>
