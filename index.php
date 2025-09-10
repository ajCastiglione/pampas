<?php
/**
 * Main index file for the theme.
 *
 * @package Minerva Web Development
 */

get_header();

?>

<div id="content">

	<main id="main" role="main">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>

			<section class="entry-content">
				<?php the_content(); ?>
			</section>

				<?php
			endwhile;
		endif;
		?>

	</main>

</div>


<?php get_footer(); ?>
