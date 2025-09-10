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

$bg_color        = get_field( 'background_color' );
$image           = get_field( 'image' );
$img_underlay    = get_stylesheet_directory_uri() . '/library/images/blue-blob.png';
$content         = get_field( 'content' );
$hero_icons      = get_stylesheet_directory_uri() . '/library/images/NA-Icon-Line-BG.png';
$dots            = get_stylesheet_directory_uri() . '/library/images/dots.png';
$secondary_icons = get_stylesheet_directory_uri() . '/library/images/NA-Intro-Icon.png';

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> bg-<?php echo esc_attr( $bg_color ); ?> text-white overflow-x-hidden">
	<div class="hero-content relative container flex flex-col md:flex-row items-center gap-12 md:gap-6 py-10 lg:py-16">
		<div class="hero-text md:w-2/5 w-full">
			<?php echo wp_kses_post( $content ); ?>
		</div>
		<?php if ( $image ) : ?>
			<div class="hero-image md:w-3/5 w-full relative pb-24 md:pb-28 lg:pb-40 z-[1]">
				<!-- Underlay -->
				<img
					class="absolute top-0 right-0 max-h-full z-[1]"
					src="<?php echo esc_url( $img_underlay ); ?>"
					alt="Image underlay"
					data-aos="fade-left"
					data-aos-anchor="#hero"
					data-aos-delay="520"
					data-aos-duration="700"
					data-aos-once="true">

				<div
					class="hero-pulse-wrap relative z-10 w-[90%] lg:w-full -right-10"
					data-aos="fade-up"
					data-aos-anchor="#hero"
					data-aos-delay="500"
					data-aos-duration="1000"
					data-aos-easing="ease-out-cubic"
					data-aos-once="true">
				</div>
			<?php endif; ?>

			<div class="hidden lg:block top-0 -left-4 border-l-2 border-accent w-1 h-full absolute"></div>
			</div>

			<img class="absolute max-w-[50%] top-[40%] right-0 pointer-events-none opacity-30" src="<?php echo esc_url( $hero_icons ); ?>" alt="Hero Icons">
</section>
