<?php
/**
 * Post template for displaying the singles.
 *
 * @package Minerva Web Development
 */

get_header();

$home_id = get_option( 'page_on_front' );
if ( $home_id ) {
	$blocks = parse_blocks( get_post_field( 'post_content', $home_id ) );
}

$related_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
		'orderby'        => 'rand',
	)
);

$use_thumbnail        = has_post_thumbnail();
$post_content_classes = $use_thumbnail ? '-mt-96 pt-[25rem]' : 'pt-6';
$dots                 = get_stylesheet_directory_uri() . '/library/images/NA-Gray-Dots.png';

?>

<div id="content">

	<main id="main" role="main">

		<?php
		get_template_part(
			'template-parts/single-header',
			null,
			array(
				'title'         => 'Explore Our Blog',
				'subtitle'      => get_the_title(),
				'use_thumbnail' => $use_thumbnail,
			)
		);
		?>

		<section class="post-content relative bg-white mb-8">
			<div class="relative container <?php echo esc_attr( $post_content_classes ); ?>">
				<?php the_content(); ?>

				<div class="hidden lg:block top-0 -left-4 border-l-2 border-accent w-1 h-[30%] absolute"></div>
				<div class="hidden lg:block top-[39%] -left-[4.5rem] absolute -rotate-90 font-semibold">Making IT Easy</div>
			</div>
		</section>

		<section class="relative mt-10 py-10 lg:py-24 bg-gray"> 
			<h3 class="text-4xl lg:text-5xl font-extralight text-center mb-12">Related Posts</h3>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 container">
				<?php
				if ( $related_query->have_posts() ) :
					while ( $related_query->have_posts() ) :
						$related_query->the_post();
						get_template_part( 'template-parts/card' );
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
			<img src="<?php echo esc_url( $dots ); ?>" alt="Gray dots" class="absolute -top-10 right-[10%] w-12 pointer-events-none hidden lg:block">
		</section>

		<?php
		if ( ! empty( $blocks ) ) :
			if ( $blocks ) {
				foreach ( $blocks as $block ) {
					if ( 'acf/testimonials' === $block['blockName'] ) {
						echo render_block( $block ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					if ( 'acf/contact' === $block['blockName'] ) {
						echo render_block( $block ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
				}
			}
		endif;
		?>

	</main>

</div>


<?php get_footer(); ?>
