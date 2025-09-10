<?php
/**
 * Template part for displaying the header of a single post or page.
 *
 * @package Minerva Web Development
 */

$container_classes = 'container relative py-10 lg:py-16';
if ( isset( $args ) ) {
	$header_title  = $args['title'] ?? '';
	$subtitle      = $args['subtitle'] ?? '';
	$body_text     = $args['body_text'] ?? '';
	$use_thumbnail = $args['use_thumbnail'] ?? false;

	if ( $use_thumbnail ) {
		$container_classes .= ' pb-0 lg:pb-1';
	}
}

?>
<header class="archive-header relative overflow-y-hidden">

	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<h4 class="text-accent uppercase mb-4"
			data-aos="fade-up" data-aos-delay="0" data-aos-duration="500" data-aos-easing="ease-out-cubic" data-aos-once="true">
			<?php echo esc_html( $header_title ); ?>
		</h4>

		<h1 class=""
			data-aos="fade-up" data-aos-delay="120" data-aos-duration="600" data-aos-easing="ease-out-cubic" data-aos-once="true">
			<?php echo wp_kses_post( $subtitle ); ?>
		</h1>

		<p class="text-white"
		data-aos="fade-up" data-aos-delay="240" data-aos-duration="600" data-aos-easing="ease-out-cubic" data-aos-once="true">
			<?php echo wp_kses_post( $body_text ); ?>
		</p>

		<div class="flex justify-between items-center mt-16">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Dots.png' ); ?>" alt="Dot pattern" class="w-12 rotate-90 ml-5"
				data-aos="fade-up" data-aos-delay="360" data-aos-duration="500" data-aos-once="true">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Intro-Icon.png' ); ?>" alt="Lines pattern" class="w-20"
				data-aos="fade-up" data-aos-delay="420" data-aos-duration="500" data-aos-once="true">
		</div>

		<?php if ( $use_thumbnail ) : ?>
			<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-full relative z-10 mt-8"
				data-aos="fade-up" data-aos-delay="480" data-aos-duration="650" data-aos-easing="ease-out-cubic" data-aos-once="true">
		<?php endif; ?>

		<div class="hidden lg:block top-0 -left-4 border-l-2 border-accent w-1 h-full absolute"></div>

		<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/library/images/NA-Icon-Line-BG.png' ); ?>" alt="Hero Background Icon" class="absolute top-0 right-0 w-[50%] pointer-events-none hidden lg:block"
			data-aos="fade-left" data-aos-delay="600" data-aos-duration="700" data-aos-once="true">
	</div>

</header>
