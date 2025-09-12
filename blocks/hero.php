<?php
/**
 * Hero Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'hero-block';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'acf-hero';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$img_or_vid = get_field( 'image_or_video' );
$image      = get_field( 'image' );
$vid        = get_field( 'video_embed' );
$content    = get_field( 'content' );
$ctas       = get_field( 'ctas' );

if ( mwd_is_mobile() ) {
	$vid_id = trim( $vid['mobile_vid_id'] );
	$aspect = 'aspect-[9/16]';
} else {
	$vid_id = trim( $vid['desktop_vid_id'] );
	$aspect = 'aspect-video';
}

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> text-white overflow-x-hidden">
	<div class="hero-content relative">
		<?php if ( ! $img_or_vid ) : ?>
			<div class="hero-image md:w-3/5 w-full relative pb-24 md:pb-28 lg:pb-40 z-[1]">
				<img class="absolute top-0 right-0 max-h-full z-[1]" src="<?php echo esc_url( $img_underlay ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
			</div>
		<?php else : ?>
			<div class="hero-video w-full relative after:absolute after:inset-0 after:w-full after:h-full after:bg-black/60 after:z-[2] after:pointer-events-none <?php echo esc_attr( $aspect ); ?>">
				<div class="absolute top-0 right-0 w-full h-full z-[1] pointer-events-none">
					<iframe
						src="https://www.youtube.com/embed/<?php echo esc_attr( $vid_id ); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo esc_attr( $vid_id ); ?>&controls=0&modestbranding=1&rel=0&showinfo=0"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						referrerpolicy="strict-origin-when-cross-origin"
						allowfullscreen></iframe>
				</div>
			</div>
		<?php endif; ?>

		<div class="hero-text w-full absolute top-1/2 -translate-y-1/2 z-[2]">
			<?php echo wp_kses_post( $content ); ?>
			<?php if ( $ctas ) : ?>
				<div class="hero-ctas flex flex-row gap-4 mt-6 justify-center">
					<?php foreach ( $ctas as $cta ) : ?>
						<a href="<?php echo esc_url( $cta['link'] ); ?>" class="<?php echo esc_attr( $cta['button_style'] ); ?>"><?php echo esc_html( $cta['text'] ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
</section>
