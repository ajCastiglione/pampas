<?php
/**
 * Content Video Block Template
 *
 * @package Minerva Web Development
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'content-video-block';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'content-video-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$content = get_field( 'content' );
$video   = get_field( 'video' );
$image   = get_field( 'image' );

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> text-white bg-gray py-10 lg:py-16">
	<div class="container">
		<div class="flex flex-col-reverse lg:flex-row justify-center items-start gap-12 md:gap-16">
			<div class="w-4/5 lg:w-2/5 video grid grid-cols-2 gap-4 lg:block">
				<?php if ( $video['video_placeholder_image'] ) : ?>
					<div class="relative inline-block">
						<?php if ( mwd_is_mobile() ) : ?>
							<img class="w-full" src="<?php echo esc_url( $video['mobile_placeholder_image']['url'] ); ?>" alt="<?php echo esc_attr( $video['mobile_placeholder_image']['alt'] ); ?>" />
						<?php else : ?>					
							<img src="<?php echo esc_url( $video['video_placeholder_image']['url'] ); ?>" alt="<?php echo esc_attr( $video['video_placeholder_image']['alt'] ); ?>" />
						<?php endif; ?>

						<div data-js-play-video class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 cursor-pointer play-button" data-video-id="<?php echo esc_attr( $video['youtube_video_id'] ); ?>">
							<?php echo wp_kses( mwd_load_svg( '/library/images/play-button.svg' ), wp_kses_svg() ); ?>
						</div>
					</div>
					<?php if ( $image ) : ?>
						<img class="lg:hidden pt-8 w-full" src="<?php echo esc_url( $image['mobile_image']['url'] ); ?>" alt="<?php echo esc_attr( $image['mobile_image']['alt'] ); ?>" />
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="content w-full lg:w-3/5 lg:pt-20">
				<?php
				if ( $content ) :
					echo wp_kses_post( $content );
				endif;
				?>
			</div>
		</div>
		<div class="image text-center lg:-mt-44 xl:-mt-80 hidden lg:block">
			<?php if ( $image ) : ?>
				<img class="ml-auto" src="<?php echo esc_url( $image['desktop_image']['url'] ); ?>" alt="<?php echo esc_attr( $image['desktop_image']['alt'] ); ?>" />
			<?php endif; ?>
		</div>
	</div>

	<div class="video-lightbox fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-70 z-20 hidden" data-js-video-lightbox>
		<div class="video-lightbox-content h-full w-full flex justify-center">
			<div class="video-lightbox-close absolute top-8 right-8 z-20" data-js-close-video>
				<i class="fa-solid fa-circle-xmark text-3xl cursor-pointer"></i>
			</div>
			<div class="video-container w-4/5 lg:w-2/3 my-auto">
				<iframe	
				data-js-video
				class="aspect-[9/16] md:aspect-video"
				data-src="https://www.youtube.com/embed/{vid_id_placeholder}?autoplay=0&mute=1&loop=0&playlist={vid_id_placeholder}&controls=0&modestbranding=1&rel=0&showinfo=0"
				frameborder="0"
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
				referrerpolicy="strict-origin-when-cross-origin"
				allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>
