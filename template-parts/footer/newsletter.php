<?php
/**
 * Newsletter signup section.
 *
 * @package Minerva Web Development
 */

$opts    = get_field( 'footer', 'option' );
$content = $opts['form_content'] ?? '';
$form_id = $opts['form_id'] ?? '';

if ( ! $form_id ) {
	return;
}

$form = do_shortcode( '[gravityform id="' . esc_attr( $form_id ) . '" title="false" description="false" ajax="true"]' );

?>
<section class="newsletter bg-black">
	<div class="container py-12 border-b-grayDark border-b-2 grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-28">
		<div class="text-white">
			<?php echo wp_kses_post( $content ); ?>
		</div>
		<div class="form">
			<?php echo $form; //phpcs:ignore ?>
		</div>
	</div>
</section>
