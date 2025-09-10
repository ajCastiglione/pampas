<?php
/**
 * Testimonials Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'testimonials-block';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonials';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$block_title = get_field( 'title' );
$intro       = get_field( 'intro' );
$reviews     = get_field( 'reviews' );
if ( empty( $reviews ) ) {
	$testimonial_query_args = array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 12,
	);
	$testimonial_query      = new WP_Query( $testimonial_query_args );
	$reviews                = $testimonial_query->posts;
}
$arrow = get_stylesheet_directory_uri() . '/library/images/review-arrow.png';
$icon  = get_stylesheet_directory_uri() . '/library/images/review-icon.png';

// Call the registered slick slider scripts and styles.
wp_enqueue_script( 'slick-slider-js' );
wp_enqueue_style( 'slick-slider-css' );
wp_enqueue_style( 'slick-slider-theme-css' );

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> py-10 lg:py-16 lg:pb-24">
	<div class="container">
		<h2 class="text-center lg:text-6xl font-extralight mb-8"
			data-aos="fade-up" data-aos-anchor="#<?php echo esc_attr( $block_id ); ?>"
			data-aos-delay="0" data-aos-duration="600" data-aos-easing="ease-out-cubic" data-aos-once="true">
			<?php echo esc_html( $block_title ); ?>
		</h2>

		<?php if ( ! empty( $intro ) ) : ?>
			<p class="text-center m-auto mb-12 max-w-4xl"
				data-aos="fade-up" data-aos-anchor="#<?php echo esc_attr( $block_id ); ?>"
				data-aos-delay="150" data-aos-duration="600" data-aos-easing="ease-out-cubic" data-aos-once="true">
				<?php echo wp_kses_post( $intro ); ?>
			</p>
		<?php endif; ?>

		<div class="relative md:px-24" data-slider-container>
			<div class="arrow-left absolute top-1/2 left-0 transform -translate-y-1/2 z-10 cursor-pointer" data-slider-prev>
				<img class="rotate-180" src="<?php echo esc_url( $arrow ); ?>" alt="Arrow Left">
			</div>

			<div data-slider>
				<?php if ( $reviews ) : ?>
					<?php
					foreach ( $reviews as $review ) :
						$review_title = get_the_title( $review->ID );
						?>
						<div class="bg-white p-6 shadow-lg border-t-8 border-accent relative text-center"
							data-aos="fade-up" data-aos-anchor="#<?php echo esc_attr( $block_id ); ?>"
							data-aos-delay="0" data-aos-duration="500" data-aos-easing="ease-out-cubic" data-aos-once="true">
							<img class="w-10 absolute -top-8 left-1/2 transform -translate-x-1/2" src="<?php echo esc_attr( $icon ); ?>" alt="Quote Icon">
							<?php if ( ! empty( get_field( 'logo', $review->ID ) ) ) : ?>
								<img class="m-auto mb-8" src="<?php echo esc_url( get_field( 'logo', $review->ID )['url'] ); ?>" alt="<?php echo esc_attr( $review_title ); ?>">
							<?php endif; ?>
							<?php echo wp_kses_post( get_field( 'review', $review->ID ) ); ?>
							<div class="h-1 w-16 max-w-full m-auto my-8"></div>
							<h4 class="text-black text-lg"><?php echo esc_html( $review_title ); ?></h4>
							<p class="text-blueMid text-sm"><?php echo esc_html( get_field( 'location', $review->ID ) ); ?></p>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>

			<div class="arrow-right absolute top-1/2 right-0 transform -translate-y-1/2 z-10 cursor-pointer" data-slider-next>
				<img src="<?php echo esc_url( $arrow ); ?>" alt="Arrow Right">
			</div>
		</div>
	</div>
</section>
