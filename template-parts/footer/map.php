<?php
/**
 * Partial for map in footer.
 *
 * @package Minerva Web Development
 */

$opts         = get_field( 'footer', 'option' );
$contact_info = get_field( 'contact_information', 'option' );
$google_map   = $opts['map'] ?? '';
$map_title    = $opts['map_title'] ?? '';
$address      = $contact_info['address'] ?? '';
$phone        = $contact_info['phone'] ?? '';
$hours        = $contact_info['hours'] ?? '';
$content_bg   = get_stylesheet_directory() . '/';

wp_enqueue_script( 'acf-map-block-js' );

?>

<section class="map bg-black">
	<div class="flex flex-col-reverse lg:flex-row items-stretch">
		<?php if ( $google_map ) : ?>
			<div class="acf-map w-full lg:w-3/5 min-h-[400px] lg:min-h-[600px]" data-zoom="14">
				<div class="marker" data-lat="<?php echo esc_attr( $google_map['lat'] ); ?>" data-lng="<?php echo esc_attr( $google_map['lng'] ); ?>"></div>
			</div>
		<?php endif; ?>

		<div class="text-white w-full lg:w-2/5 p-10 md:p-16 lg:p-20 relative overflow-hidden flex items-center flex-col">
			<div class="absolute -top-1/3 -left-1/2 w-full h-full [&>svg]:w-[185%] [&>svg]:h-[185%] pointer-events-none"><?php echo wp_kses( mwd_load_svg( '/library/images/map-bg-img.svg' ), wp_kses_svg() ); ?></div>
			<div class="relative z-10">
				<?php if ( $map_title ) : ?>
					<h2 class="text-4xl md:text-6xl"><?php echo wp_kses_post( $map_title ); ?></h2>
				<?php endif; ?>
				<div class="max-w-80">
					<p class="font-bold mb-0">Address</p>
					<div class="mb-5">
						<p><?php echo esc_html( $address ); ?></p>
						<a class="btn-inline" href="https://www.google.com/maps/search/?api=1&query=Pampas+Las+Vegas" target="_blank" rel="noopener noreferrer">Get Directions</a>
					</div>
					<p class="font-bold mb-0">Phone</p>
					<p class="mb-5"><?php echo esc_html( $phone ); ?></p>
					<p class="font-bold mb-0">Hours</p>
					<p class="mb-5"><?php echo esc_html( $hours ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
