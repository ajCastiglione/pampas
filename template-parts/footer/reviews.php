<?php
/**
 * Partial for displaying reviews in the footer.
 *
 * @package Minerva Web Development
 */

$opts              = get_field( 'footer', 'option' );
$content           = $opts['reviews_content'] ?? '';
$testimonial_posts = $opts['reviews_to_show'] ?? null;
$gallery           = $opts['reviews_images'] ?? array();

if ( is_null( $testimonial_posts ) || ! $testimonial_posts ) {
	$testimonials_args  = array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 5,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
	$testimonials_query = new WP_Query( $testimonials_args );
	$testimonial_posts  = $testimonials_query->posts;
}

wp_enqueue_style( 'slick-slider-css' );
wp_enqueue_style( 'slick-slider-theme-css' );
wp_enqueue_script( 'slick-slider-js' );

?>
<section class="reviews bg-gray py-10 md:py-16">
	<div class="container">
		<div class="flex flex-col lg:flex-row items-center gap-6 justify-between mb-20">
			<div class="w-full lg:w-1/2 text-white"><?php echo wp_kses_post( $content ); ?></div>
			<div class="w-full lg:w-1/2 text-white">
				<div data-slider-container class="reviews-slider relative text-center bg-black px-8 py-11 rounded-tr-[50px] rounded-bl-[50px]">

					<i data-slider-prev class="fa-solid fa-angle-left cursor-pointer absolute left-3 top-1/2 transform -translate-y-1/2 text-3xl"></i>
					<div data-slider>
						<?php
						if ( $testimonial_posts ) :
							foreach ( $testimonial_posts as $testimonial ) :
								?>
								<div class="px-8">
									<div class="font-sans text-xl md:text-3xl mb-4"><?php echo wp_kses_post( get_the_title( $testimonial->ID ) ); ?></div>
									<p class="text-base md:text-lg font-inter">"<?php echo wp_kses_post( get_field( 'review', $testimonial->ID ) ); ?>"</p>
								</div>
								<?php
							endforeach;
							wp_reset_postdata();
						endif;
						?>
					</div>
					<div class="review-source flex items-center justify-center gap-2 mt-8 text-lg">
						<?php echo wp_kses( mwd_load_svg( '/library/images/stars.svg' ), wp_kses_svg() ); ?>
						<span>|</span>
						<span class="font-inter font-light">Google Review</span>
					</div>

					<i data-slider-next class="fa-solid fa-angle-right cursor-pointer absolute right-3 top-1/2 transform -translate-y-1/2 text-3xl"></i>

				</div>
			</div>
		</div>

		<?php if ( $gallery ) : ?>
		<div class="grid grid-cols-4 place-items-center gap-4 md:gap-12 lg:gap-40">
			<?php foreach ( $gallery as $image ) : ?>
				<div class="w-auto max-w-48">
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>

</section>
