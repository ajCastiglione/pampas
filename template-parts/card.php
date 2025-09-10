<?php
/**
 * Card template for post content.
 *
 * @package Minerva Web Development
 */

$single_id  = get_the_ID();
$thumbnail  = get_the_post_thumbnail_url( $single_id, 'medium' );
$post_title = get_the_title( $single_id );
$excerpt    = get_the_excerpt( $single_id );
$permalink  = get_permalink( $single_id );

if ( ! $thumbnail ) {
	$thumbnail = get_stylesheet_directory_uri() . '/library/images/default-thumbnail.png'; // Fallback image.
}

?>


<article id="post-<?php echo esc_attr( $single_id ); ?>" class="post-card border-t-8 border-accent shadow-lg" data-aos="fade-up" data-aos-delay="0" data-aos-duration="550" data-aos-easing="ease-out-cubic" data-aos-once="true">
	<a href="<?php echo esc_url( $permalink ); ?>" class="block">
	<img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $post_title ); ?>" class="w-full h-auto mb-4">
	<div class="card-content p-6">
	<h2 class="text-xl font-semibold mb-2"><?php echo esc_html( $post_title ); ?></h2>
	<p class=""><?php echo esc_html( $excerpt ); ?></p>
	<a href="<?php echo esc_url( $permalink ); ?>" class="btn btn-blue">Read More</a>
  </div>
	</a>
</article>
